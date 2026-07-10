<?php
// i18n + URL helpers for the JOURNEYWAYS website (PHP server-render, no framework).
// English is the source of truth; es/fr are deep-merged over it so any untranslated
// key falls back to English automatically. See www/CLAUDE.md.

const JW_LANGS        = ['en', 'es', 'fr'];
const JW_DEFAULT_LANG = 'en';
const JW_ORIGIN       = 'https://www.journeyways.ca';

// Split a REQUEST_URI into [lang, cleanPath]. A leading /es or /fr selects that
// language; anything else (incl. an explicit /en) is English at the bare path.
function jw_resolve_lang(string $uri): array {
    $path = parse_url($uri, PHP_URL_PATH) ?: '/';
    $langs = implode('|', array_filter(JW_LANGS, fn($l) => $l !== JW_DEFAULT_LANG));
    if (preg_match('#^/(' . $langs . ')(/.*)?$#', $path, $m)) {
        return [$m[1], ($m[2] ?? '') === '' ? '/' : $m[2]];
    }
    return [JW_DEFAULT_LANG, $path];
}

// Build the URL for an English canonical path in a given language.
function jw_url(string $enPath, string $lang): string {
    if ($lang === JW_DEFAULT_LANG) return $enPath;
    return $enPath === '/' ? "/$lang/" : "/$lang" . $enPath;
}

// Nav/link target for an English path: the localized URL when that page is
// published in this language, else the English static path (phased-rollout safe).
function jw_page_url(string $enPath, string $lang): string {
    global $JW_PAGES;
    $pg = $JW_PAGES[$enPath] ?? null;
    return ($pg && in_array($lang, $pg['langs'], true)) ? jw_url($enPath, $lang) : $enPath;
}

// Read one JSON dictionary file (missing file -> empty).
function jw_read_json(string $abs): array {
    return is_file($abs) ? (json_decode(file_get_contents($abs), true) ?: []) : [];
}

// Load the active dictionary: shared chrome (lang/<lang>.json, keyed "common")
// plus, if a page is given, that page's strings from lang/<lang>/<page>.json nested
// under pages.<page>. Every layer is deep-merged over English (per-key fallback).
function jw_load_dict(string $lang, ?string $page = null): array {
    static $cache = [];
    $ck = $lang . '|' . ($page ?? '');
    if (isset($cache[$ck])) return $cache[$ck];
    $base = __DIR__ . '/../lang';
    $dict = jw_read_json("$base/en.json");
    if ($lang !== JW_DEFAULT_LANG) $dict = jw_deep_merge($dict, jw_read_json("$base/$lang.json"));
    if ($page !== null) {
        $pg = jw_read_json("$base/en/$page.json");
        if ($lang !== JW_DEFAULT_LANG) $pg = jw_deep_merge($pg, jw_read_json("$base/$lang/$page.json"));
        $dict['pages'][$page] = $pg;
    }
    return $cache[$ck] = $dict;
}

// JS-facing strings (gallery lightbox captions + CTA), shared across pages,
// injected as window.__I18N. English baked into main.js is the fallback.
function jw_load_js(string $lang): array {
    $base = __DIR__ . '/../lang';
    $js = jw_read_json("$base/en/js.json");
    if ($lang !== JW_DEFAULT_LANG) $js = jw_deep_merge($js, jw_read_json("$base/$lang/js.json"));
    return $js;
}

function jw_deep_merge(array $base, array $over): array {
    foreach ($over as $k => $v) {
        $base[$k] = (is_array($v) && isset($base[$k]) && is_array($base[$k]))
            ? jw_deep_merge($base[$k], $v) : $v;
    }
    return $base;
}

// Dot-path lookup into the active dictionary. Missing key returns the key itself
// (loud in dev, harmless in prod). Non-string leaves come back raw via jw_get().
function t(string $key): string {
    $v = jw_get($key);
    return is_string($v) ? $v : $key;
}

function jw_get(string $key) {
    global $JW_DICT;
    $v = $JW_DICT;
    foreach (explode('.', $key) as $seg) {
        if (is_array($v) && array_key_exists($seg, $v)) { $v = $v[$seg]; }
        else { return $key; }
    }
    return $v;
}

// Optional lookup: returns $default when the key is absent (jw_get echoes the key
// back on a miss), else the value. Use for optional meta like robots.
function jw_opt(string $key, $default = null) {
    $v = jw_get($key);
    return $v === $key ? $default : $v;
}

function esc(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// Shorthand: escaped dictionary string.
function te(string $key): string { return esc(t($key)); }

// A language the visitor prefers (per Accept-Language) that differs from the page
// and is available for it, or null. Drives the dismissible suggestion banner.
function jw_suggested_lang(string $current, array $available): ?string {
    $al = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
    foreach (explode(',', $al) as $part) {
        $code = strtolower(substr(trim($part), 0, 2));
        if (in_array($code, JW_LANGS, true)) {
            return ($code !== $current && in_array($code, $available, true)) ? $code : null;
        }
    }
    return null;
}
