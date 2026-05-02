/**
 * © 2026 Adri M. CC BY-NC 4.0.
 *
 * Tiny backend for www.journeyways.ca. Currently does one job: accept the
 * contact form submission from /about.html, validate it, send an email.
 *
 * Sits behind nginx on 127.0.0.1; nginx proxies /api/ here. No public port.
 *
 * Required env (in ./server/.env, gitignored):
 *   SMTP_HOST=...
 *   SMTP_PORT=465
 *   SMTP_USER=...
 *   SMTP_PASS=...
 *   SMTP_FROM=noreply@journeyways.ca
 *   CONTACT_EMAIL=...   # destination address for contact submissions
 *
 * Optional env:
 *   PORT=1985                   # local listen port (default 1985)
 *   NODE_ENV=production
 *   TURNSTILE_SECRET_KEY=...    # Cloudflare Turnstile secret. If set, contact form
 *                               # submissions must include a valid Turnstile token.
 *                               # If unset, Turnstile verification is skipped.
 */
require('dotenv').config({ quiet: true });
const express = require('express');
const nodemailer = require('nodemailer');

const PORT = parseInt(process.env.PORT || '1985', 10);

const ALLOWED_INTERESTS = new Set([
  'player',
  'researcher',
  'educator',
  'therapist',
  'organizer',
  'variant-author',
  'press',
  'other',
]);

const INTEREST_LABELS = {
  'player': 'Player or curious about the game',
  'researcher': 'Researcher',
  'educator': 'Educator',
  'therapist': 'Therapist or healthcare provider',
  'organizer': 'Community organizer',
  'variant-author': 'Wants to author a variant',
  'press': 'Journalist or press',
  'other': 'Other',
};

const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

// ---------- Mailer ----------

let _transporter = null;

function getTransporter() {
  if (_transporter) return _transporter;
  const { SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASS } = process.env;
  if (!SMTP_HOST || !SMTP_USER || !SMTP_PASS) {
    console.warn('[mailer] SMTP not configured (SMTP_HOST/USER/PASS). Emails will not be sent.');
    return null;
  }
  _transporter = nodemailer.createTransport({
    host: SMTP_HOST,
    port: parseInt(SMTP_PORT || '465', 10),
    secure: String(SMTP_PORT || '465') === '465',
    auth: { user: SMTP_USER, pass: SMTP_PASS },
    tls: { rejectUnauthorized: true },
  });
  _transporter.verify((err) => {
    if (err) console.error('[mailer] SMTP verify failed:', err.message);
    else console.info('[mailer] SMTP connection healthy.');
  });
  return _transporter;
}

// ---------- Rate limit (in-memory, per-IP) ----------

const rateStore = new Map();

function rateLimit(windowMs, max) {
  // Periodic prune so the map doesn't grow unbounded.
  setInterval(() => {
    const now = Date.now();
    for (const [k, v] of rateStore.entries()) {
      if (now >= v.resetAt) rateStore.delete(k);
    }
  }, 5 * 60 * 1000).unref();

  return function (req, res, next) {
    const ip = req.ip || 'unknown';
    const now = Date.now();
    let entry = rateStore.get(ip);
    if (!entry || now >= entry.resetAt) {
      entry = { count: 0, resetAt: now + windowMs };
      rateStore.set(ip, entry);
    }
    entry.count += 1;
    if (entry.count > max) {
      const retryAfter = Math.ceil((entry.resetAt - now) / 1000);
      res.set('Retry-After', String(retryAfter));
      return res.status(429).json({ error: 'Too many attempts. Please try again later.', retryAfter });
    }
    next();
  };
}

// ---------- Helpers ----------

function escapeHtml(s) {
  return String(s)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');
}

// ---------- Cloudflare Turnstile verification ----------

const TURNSTILE_VERIFY_URL = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

/**
 * Verifies a Turnstile token with Cloudflare. Returns:
 *   { skipped: true } if TURNSTILE_SECRET_KEY is unset (graceful degradation)
 *   { ok: true } on successful verification
 *   { ok: false, reason } on failure
 */
async function verifyTurnstile(token, ip) {
  const secret = process.env.TURNSTILE_SECRET_KEY;
  if (!secret) return { skipped: true };
  if (!token || typeof token !== 'string') {
    return { ok: false, reason: 'missing-token' };
  }
  const params = new URLSearchParams({ secret, response: token });
  if (ip) params.append('remoteip', ip);
  try {
    const res = await fetch(TURNSTILE_VERIFY_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: params.toString(),
    });
    const data = await res.json();
    if (data && data.success === true) return { ok: true };
    return { ok: false, reason: 'verify-failed', errorCodes: data && data['error-codes'] };
  } catch (err) {
    return { ok: false, reason: 'verify-error', message: err.message };
  }
}

// ---------- Express app ----------

const app = express();

// Behind nginx on 127.0.0.1. trust proxy: 1 lets req.ip reflect X-Forwarded-For
// instead of always being 127.0.0.1, so the rate limiter sees real client IPs.
app.set('trust proxy', 1);

// Health check (used by monitoring or manual smoke tests).
app.get('/api/health', (req, res) => {
  res.json({
    ok: true,
    smtpConfigured: Boolean(process.env.SMTP_HOST && process.env.SMTP_USER && process.env.SMTP_PASS),
  });
});

// Contact form submission.
app.post(
  '/api/contact',
  rateLimit(60 * 60 * 1000, 5), // 5 submissions per hour per IP
  express.json({ limit: '8kb' }),
  async (req, res) => {
    const body = req.body || {};

    // Honeypot: silent success (don't tell bots they were caught).
    if (body.website && String(body.website).trim() !== '') {
      console.info('[contact] honeypot triggered', { ip: req.ip });
      return res.status(200).json({ ok: true });
    }

    const name = typeof body.name === 'string' ? body.name.trim() : '';
    const email = typeof body.email === 'string' ? body.email.trim() : '';
    const message = typeof body.message === 'string' ? body.message.trim() : '';
    const rawInterests = Array.isArray(body.interests) ? body.interests : [];
    const interests = rawInterests
      .filter((i) => typeof i === 'string' && ALLOWED_INTERESTS.has(i))
      .slice(0, ALLOWED_INTERESTS.size);

    if (!name || name.length > 100) {
      return res.status(400).json({ error: 'A valid name is required (under 100 characters).' });
    }
    if (!email || email.length > 200 || !EMAIL_RE.test(email)) {
      return res.status(400).json({ error: 'A valid email is required.' });
    }
    if (message.length > 1000) {
      return res.status(400).json({ error: 'Message must be under 1000 characters.' });
    }

    // Verify the Turnstile token if one was sent or if a secret is configured.
    const turnstileResult = await verifyTurnstile(body.turnstileToken, req.ip);
    if (turnstileResult.skipped) {
      console.warn('[contact] Turnstile not configured, skipping verification.');
    } else if (!turnstileResult.ok) {
      console.warn('[contact] Turnstile verification failed', { reason: turnstileResult.reason, ip: req.ip });
      return res.status(400).json({ error: 'Verification failed. Please refresh the page and try again.' });
    }

    const destination = process.env.CONTACT_EMAIL || process.env.SMTP_FROM;
    if (!destination) {
      console.error('[contact] no destination configured (CONTACT_EMAIL and SMTP_FROM both unset).');
      return res.status(503).json({ error: 'Contact temporarily unavailable. Please try again later.' });
    }

    const transport = getTransporter();
    if (!transport) {
      return res.status(503).json({ error: 'Contact temporarily unavailable. Please try again later.' });
    }

    const interestList = interests.length
      ? interests.map((i) => INTEREST_LABELS[i] || i).join(', ')
      : '(none specified)';

    const subject = 'JOURNEYWAYS contact form: ' + name;
    const text =
      'New contact form submission from www.journeyways.ca/about.html\n\n' +
      'Name: ' + name + '\n' +
      'Email: ' + email + '\n' +
      'Reaching out as: ' + interestList + '\n\n' +
      'Message:\n' + (message || '(no message)') + '\n';

    const html =
      '<h2>JOURNEYWAYS contact form submission</h2>' +
      '<p><strong>From:</strong> ' + escapeHtml(name) + ' &lt;' + escapeHtml(email) + '&gt;</p>' +
      '<p><strong>Reaching out as:</strong> ' + escapeHtml(interestList) + '</p>' +
      '<p><strong>Message:</strong></p>' +
      '<blockquote style="border-left:3px solid #fbbf24; padding-left:12px; color:#444;">' +
      (message ? escapeHtml(message).replace(/\n/g, '<br>') : '<em>(no message)</em>') +
      '</blockquote>' +
      '<hr><p style="font-size:12px; color:#888;">Submitted from IP ' + escapeHtml(req.ip || 'unknown') + '</p>';

    try {
      const info = await transport.sendMail({
        from: process.env.SMTP_FROM || 'noreply@journeyways.ca',
        to: destination,
        replyTo: email,
        subject,
        html,
        text,
      });
      console.info('[contact] message sent', { messageId: info.messageId, name, email });
      return res.status(200).json({ ok: true });
    } catch (err) {
      console.error('[contact] send failed:', err.message);
      return res.status(502).json({ error: 'Could not send your message. Please try again later.' });
    }
  }
);

// Anything else under /api/.
app.use('/api', (req, res) => {
  res.status(404).json({ error: 'Not found' });
});

app.listen(PORT, '127.0.0.1', () => {
  console.info(`[journeyways-www-backend] listening on 127.0.0.1:${PORT}`);
});
