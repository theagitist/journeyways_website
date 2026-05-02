# www.journeyways.ca backend

A tiny Express app that lives behind nginx on `127.0.0.1`. It currently does one thing: receive contact-form submissions from `/about.html`, validate them, and email them out via SMTP.

## What it exposes

- `POST /api/contact` — accepts JSON `{ name, email, interests[], message, website }`. The `website` field is a honeypot; bots fill it, humans don't. Rate-limited to 5 submissions per hour per IP.
- `GET /api/health` — returns `{ ok: true, smtpConfigured: <bool> }`. Useful for monitoring.

## Setup

```bash
cd /var/www/www.journeyways.ca/server
npm install
cp .env.example .env
# edit .env with your SMTP credentials and the destination address
mkdir -p logs
pm2 start ecosystem.config.cjs
pm2 save
```

## Required env (in `./.env`, gitignored)

| Var | Required | Notes |
|---|---|---|
| `SMTP_HOST` | yes | e.g. `smtp.example.com` |
| `SMTP_PORT` | yes | `465` for SMTPS, `587` for STARTTLS |
| `SMTP_USER` | yes | SMTP username |
| `SMTP_PASS` | yes | SMTP password |
| `SMTP_FROM` | yes | "From" address (e.g. `noreply@journeyways.ca`) |
| `CONTACT_EMAIL` | optional | Destination for contact submissions. Falls back to `SMTP_FROM`. |
| `PORT` | optional | Defaults to `1985`. Must match the `proxy_pass` in nginx. |

`./.env` is gitignored. Never commit it.

## nginx side

The vhost for `www.journeyways.ca` proxies `/api/` to `127.0.0.1:1985`. See `/etc/nginx/sites-available/www.journeyways.ca.conf`.

## Operational notes

- The app refuses to send when SMTP isn't configured (returns 503). It will not crash; the form will show "Contact temporarily unavailable."
- Rate limit state is in-memory and resets on restart. Acceptable for a contact form.
- No persistent storage. All submissions go straight to email.
- Logs at `./logs/{out,err}.log`. PM2 rotates them by default.
