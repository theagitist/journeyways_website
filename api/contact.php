<?php
// Contact form handler for www.journeyways.ca. Replaces the retired Node server/.
// POST JSON {name,email,interests[],message,website(honeypot),turnstileToken,lang}.
// Validates, verifies Cloudflare Turnstile (if configured), rate-limits per IP,
// and sends via authenticated SMTP (ZeptoMail). Zero third-party dependencies.
//
// Secrets live OUTSIDE the web docroot in /etc/journeyways/www-config.php (owner
// theagitist:www-data, 0640), which defines: JW_SMTP_HOST, JW_SMTP_PORT,
// JW_SMTP_USER, JW_SMTP_PASS, JW_SMTP_FROM, JW_CONTACT_EMAIL, and optionally
// JW_TURNSTILE_SECRET. See api/www-config.sample.php. Missing config -> 503, never
// leaks why. User-facing errors are localized via the contact page dictionary.

require_once __DIR__ . '/../inc/i18n.php';

const JW_CONTACT_CONFIG = '/etc/journeyways/www-config.php';
const JW_ALLOWED_INTERESTS = ['player','researcher','educator','therapist','organizer','variant-author','press','other'];
const JW_RATE_MAX = 5;              // submissions
const JW_RATE_WINDOW = 3600;        // per hour, per IP
const JW_EMAIL_RE = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';

// ---- pure helpers (exercised by the CLI self-test at the bottom) ----

function jw_valid_email(string $e): bool {
    return $e !== '' && strlen($e) <= 200 && preg_match(JW_EMAIL_RE, $e) === 1;
}
// Strip CR/LF so attacker input can never inject extra SMTP/mail headers.
function jw_header_safe(string $s): string {
    return trim(str_replace(["\r", "\n"], ' ', $s));
}
function jw_filter_interests($raw): array {
    if (!is_array($raw)) return [];
    return array_values(array_intersect(
        array_filter($raw, 'is_string'),
        JW_ALLOWED_INTERESTS
    ));
}
// File-based fixed-window limiter (no persistent process to hold state).
// Returns true if this hit is allowed.
function jw_rate_ok(string $ip, string $dir, int $now): bool {
    if (!is_dir($dir)) @mkdir($dir, 0700, true);
    $f = $dir . '/' . sha1($ip) . '.json';
    $fh = @fopen($f, 'c+');
    if (!$fh) return true; // fail open: never block a real user on an FS hiccup
    flock($fh, LOCK_EX);
    $data = json_decode(stream_get_contents($fh) ?: '', true);
    if (!is_array($data) || ($data['resetAt'] ?? 0) <= $now) {
        $data = ['count' => 0, 'resetAt' => $now + JW_RATE_WINDOW];
    }
    $data['count']++;
    $ok = $data['count'] <= JW_RATE_MAX;
    ftruncate($fh, 0); rewind($fh); fwrite($fh, json_encode($data));
    flock($fh, LOCK_UN); fclose($fh);
    return $ok;
}

// ---- request handling (skipped under CLI self-test) ----

if (php_sapi_name() !== 'cli') {
    header('Content-Type: application/json; charset=utf-8');

    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        return;
    }

    $body = json_decode(file_get_contents('php://input', false, null, 0, 8192) ?: '', true);
    if (!is_array($body)) $body = [];

    // Localized errors: resolve the page language from the payload.
    $lang = (is_string($body['lang'] ?? null) && in_array($body['lang'], JW_LANGS, true))
        ? $body['lang'] : JW_DEFAULT_LANG;
    $GLOBALS['JW_DICT'] = jw_load_dict($lang, 'contact');
    $err = fn(string $k) => t("pages.contact.errors.$k");
    $fail = function (int $code, string $key) use ($err) {
        http_response_code($code);
        echo json_encode(['error' => $err($key)]);
        exit;
    };

    // Honeypot: pretend success so bots learn nothing.
    if (trim((string)($body['website'] ?? '')) !== '') {
        echo json_encode(['ok' => true]);
        return;
    }

    $name    = jw_header_safe((string)($body['name'] ?? ''));
    $email   = jw_header_safe((string)($body['email'] ?? ''));
    $message = trim((string)($body['message'] ?? ''));
    $interests = jw_filter_interests($body['interests'] ?? []);

    if ($name === '' || mb_strlen($name) > 100) $fail(400, 'name_required');
    if (!jw_valid_email($email))                 $fail(400, 'email_required');
    if (mb_strlen($message) > 1000)              $fail(400, 'message_too_long');

    // Config is required to actually send. Absent -> unavailable (never say why).
    if (!is_file(JW_CONTACT_CONFIG)) $fail(503, 'unavailable');
    require JW_CONTACT_CONFIG;
    if (!defined('JW_SMTP_HOST') || !defined('JW_SMTP_USER') || !defined('JW_SMTP_PASS')) {
        $fail(503, 'unavailable');
    }

    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $ip = trim(explode(',', $ip)[0]);

    // Cloudflare Turnstile (only if a secret is configured).
    if (defined('JW_TURNSTILE_SECRET') && JW_TURNSTILE_SECRET !== '') {
        if (!jw_turnstile_ok((string)($body['turnstileToken'] ?? ''), $ip)) {
            $fail(400, 'verification_failed');
        }
    }

    if (!jw_rate_ok($ip, sys_get_temp_dir() . '/jw-contact-rate', time())) {
        header('Retry-After: 3600');
        $fail(429, 'rate_limited');
    }

    $labels = jw_get('pages.contact.interests');
    $interestList = $interests
        ? implode(', ', array_map(fn($i) => is_array($labels) && isset($labels[$i]) ? $labels[$i] : $i, $interests))
        : '(none specified)';

    $to      = defined('JW_CONTACT_EMAIL') && JW_CONTACT_EMAIL ? JW_CONTACT_EMAIL : JW_SMTP_FROM;
    $subject = 'JOURNEYWAYS contact form: ' . $name;
    $text = "New contact form submission from www.journeyways.ca/contact.html\n\n"
        . "Name: $name\nEmail: $email\nReaching out as: $interestList\n\n"
        . "Message:\n" . ($message !== '' ? $message : '(no message)') . "\n";

    $ok = jw_smtp_send([
        'host' => JW_SMTP_HOST, 'port' => defined('JW_SMTP_PORT') ? (int)JW_SMTP_PORT : 465,
        'user' => JW_SMTP_USER, 'pass' => JW_SMTP_PASS,
        'from' => JW_SMTP_FROM, 'to' => $to, 'replyto' => $email,
        'subject' => $subject, 'text' => $text,
    ]);

    if ($ok) { echo json_encode(['ok' => true]); }
    else     { $fail(502, 'send_failed'); }
    return;
}

// ---- Turnstile + SMTP (defined below the request block; hoisted at parse time) ----

function jw_turnstile_ok(string $token, string $ip): bool {
    if ($token === '') return false;
    $post = http_build_query(['secret' => JW_TURNSTILE_SECRET, 'response' => $token, 'remoteip' => $ip]);
    $ctx = stream_context_create(['http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => $post, 'timeout' => 8,
    ]]);
    $res = @file_get_contents('https://challenges.cloudflare.com/turnstile/v0/siteverify', false, $ctx);
    $data = json_decode($res ?: '', true);
    return is_array($data) && ($data['success'] ?? false) === true;
}

// Minimal authenticated SMTPS sender (implicit TLS, AUTH LOGIN, one recipient,
// multipart/alternative text+HTML). Returns true on a 250 after end-of-data.
function jw_smtp_send(array $m): bool {
    $secure = $m['port'] === 465 ? 'ssl://' : '';
    $fp = @stream_socket_client($secure . $m['host'] . ':' . $m['port'], $e, $s, 15);
    if (!$fp) return false;
    stream_set_timeout($fp, 15);

    $read = function () use ($fp) {
        $data = '';
        while (($line = fgets($fp, 515)) !== false) {
            $data .= $line;
            if (strlen($line) >= 4 && $line[3] === ' ') break; // last line of reply
        }
        return $data;
    };
    $cmd = function (string $c, string $expect) use ($fp, $read): bool {
        if ($c !== '') fwrite($fp, $c . "\r\n");
        return str_starts_with(ltrim($read()), $expect);
    };

    $host = jw_header_safe($m['host']);
    $ok = $cmd('', '220')
        && $cmd('EHLO ' . $host, '250')
        && $cmd('AUTH LOGIN', '334')
        && $cmd(base64_encode($m['user']), '334')
        && $cmd(base64_encode($m['pass']), '235')
        && $cmd('MAIL FROM:<' . jw_header_safe($m['from']) . '>', '250')
        && $cmd('RCPT TO:<' . jw_header_safe($m['to']) . '>', '250')
        && $cmd('DATA', '354');
    if (!$ok) { fclose($fp); return false; }

    $boundary = 'jw' . bin2hex(random_bytes(8));
    $from = jw_header_safe($m['from']);
    $headers =
        'From: JOURNEYWAYS <' . $from . ">\r\n" .
        'To: <' . jw_header_safe($m['to']) . ">\r\n" .
        'Reply-To: <' . jw_header_safe($m['replyto']) . ">\r\n" .
        'Subject: ' . jw_header_safe($m['subject']) . "\r\n" .
        "MIME-Version: 1.0\r\n" .
        'Content-Type: multipart/alternative; boundary="' . $boundary . "\"\r\n";
    $htmlBody = '<p>' . nl2br(htmlspecialchars($m['text'], ENT_QUOTES, 'UTF-8')) . '</p>';
    $mime =
        "--$boundary\r\nContent-Type: text/plain; charset=UTF-8\r\n\r\n" . $m['text'] . "\r\n" .
        "--$boundary\r\nContent-Type: text/html; charset=UTF-8\r\n\r\n" . $htmlBody . "\r\n" .
        "--$boundary--\r\n";
    // Dot-stuff any line starting with '.' per RFC 5321.
    $data = preg_replace('/^\./m', '..', $headers . "\r\n" . $mime);
    fwrite($fp, $data . "\r\n.\r\n");
    $sent = str_starts_with(ltrim($read()), '250');
    $cmd('QUIT', '221');
    fclose($fp);
    return $sent;
}

// ---- CLI self-test: `php api/contact.php` (no web request needed) ----

if (php_sapi_name() === 'cli') {
    assert(jw_valid_email('a@b.co') === true);
    assert(jw_valid_email('nope') === false);
    assert(jw_valid_email('a@b') === false);
    assert(jw_valid_email(str_repeat('x', 200) . '@b.co') === false); // >200
    $safe = jw_header_safe("hi\r\nBcc: x@y.z");                          // header injection stripped
    assert(strpbrk($safe, "\r\n") === false && str_contains($safe, 'Bcc'));
    assert(jw_filter_interests(['player', 'evil', 'press', 42]) === ['player', 'press']);
    assert(jw_filter_interests('nope') === []);
    $dir = sys_get_temp_dir() . '/jw-contact-selftest-' . getmypid();
    $now = 1000000;
    for ($i = 1; $i <= JW_RATE_MAX; $i++) assert(jw_rate_ok('1.2.3.4', $dir, $now) === true);
    assert(jw_rate_ok('1.2.3.4', $dir, $now) === false);            // 6th blocked
    assert(jw_rate_ok('1.2.3.4', $dir, $now + JW_RATE_WINDOW + 1) === true); // window reset
    assert(jw_rate_ok('9.9.9.9', $dir, $now) === true);            // other IP independent
    array_map('unlink', glob("$dir/*.json")); @rmdir($dir);
    fwrite(STDOUT, "contact.php self-test OK\n");
}
