# CLAUDE.md (www.journeyways.ca)

Operator's quick reference for this site. Pairs with `README.md` (user-facing copy and changelog) and `brainstorm/` (project context for site-copy work). When editing copy, read `brainstorm/proposal-summary.md` first.

## What this is

A static HTML site (6 visible pages + 1 hidden) plus a tiny Node backend in `server/` that handles a contact form. The site is the public face of Adri M.'s master's research at UBC GRSJ; tone is academic-yet-friendly. See `brainstorm/proposal-summary.md` for project framing, voice, and content principles.

## Layout

```
www.journeyways.ca/
├── index.html              Home (rulebook hero copy + 3 feature cards + boardgame snapshot)
├── boardgame.html          How to play; rules and components
├── videogame.html          Digital version dev log (under development)
├── photos.html             Research gallery + lightbox (6 entries)
├── about.html              About the researcher; bio, project narrative, inline anchors into design.html. "Get in touch" section currently commented out
├── design.html             Design philosophy (long-form essay; 9 principles, illustrated with card and tile artwork; anchored from about.html)
├── contact.html            Contact form (HIDDEN: noindex, not in nav, not in sitemap)
├── css/styles.css          Custom CSS (marquee fade, devlog, lightbox, hover transitions)
├── js/main.js              Mobile menu, cookie banner, CTA injection, lightbox, contact form handler
├── img/                    Site images + thumbnails
├── download/               Game rules and character sheet PDFs
├── server/                 Tiny Node backend (Express + Nodemailer). PM2 app `journeyways-www`. Currently stopped.
├── brainstorm/             Working notes (gitignored, synced to Obsidian vault)
├── sitemap.xml             6 entries; contact.html intentionally absent
└── .gitignore              Ignores brainstorm/, server/node_modules/, server/.env, server/logs/
```

## How it runs

- **Static pages**: nginx serves `/var/www/www.journeyways.ca/`. Vhost at `/etc/nginx/sites-available/www.journeyways.ca.conf`.
- **Tailwind**: loaded via Play CDN (`<script src="https://cdn.tailwindcss.com">`), so utility classes resolve at runtime in the browser. No build step. The CSP allows the CDN.
- **Backend**: PM2 app `journeyways-www` (script: `server/index.js`, port `127.0.0.1:1985`). nginx proxies `/api/` to it. **Currently stopped**; resume with `pm2 start journeyways-www`. See `server/README.md` for details.
- **Cache-busting**: stylesheet and script tags use `?v=N` (currently `styles.css?v=6`, `main.js?v=5`). Bump on every CSS/JS change since `Cache-Control: max-age=31536000`.

## Operational state (May 2026)

- **`contact.html` is hidden.** Mailgun delivers cleanly to Outlook 365 (status 250, "Queued for delivery"), but the recipient inbox doesn't see them: spam/quarantine on the receiving side. Until that's resolved, the page is `noindex, nofollow`, off the nav, and out of the sitemap. The about page's "Get in touch" section is commented out for now. Backend is stopped.
- **`design.html` (Design philosophy)** is live and in the main nav. Anchored sections (`#identity`, `#no-winning`, `#consent`, `#elicit`, `#combination`, `#expression`, `#materials`, `#framework`, `#shared`, `#closing`) are linked inline from `about.html` paragraphs. The page uses `.card-COLOR` and `.tile-wood` for category-name highlighting; both classes live in `css/styles.css`.
- **`server/.env` holds Mailgun SMTP creds and the Cloudflare Turnstile secret.** Values were copied from `/var/www/play.journeyways.ca/.env`. Gitignored. Don't read or echo.
- **`brainstorm/`** is gitignored. A PostToolUse hook in `.claude/settings.local.json` rsyncs it to `~/apps/obsidian/Academic/Journeyways/Website brainstorm/` on every Edit/Write/MultiEdit. If sync drifts, open `/hooks` in Claude Code once to reload.
- **Rollback tag** `pre-copy-rework` (in git) marks the state before the rulebook hero copy and about-page work. `git reset --hard pre-copy-rework` to revert all of that.

## Common commands

```bash
# Verify a page serves
/usr/bin/curl -sk -H "Host: www.journeyways.ca" "https://127.0.0.1/" -o /dev/null -w "%{http_code}\n"

# Resume the contact-form backend (after fixing the deliverability issue)
pm2 start journeyways-www && pm2 save
pm2 logs journeyways-www --lines 50

# Smoke-test backend health (after start)
/usr/bin/curl -sk -H "Host: www.journeyways.ca" "https://127.0.0.1/api/health"

# Reload nginx after vhost change (always test first)
sudo nginx -t && sudo systemctl reload nginx

# Bump asset cache version (current: styles.css?v=6, main.js?v=5)
sed -i 's|styles.css?v=6|styles.css?v=7|' /var/www/www.journeyways.ca/*.html
sed -i 's|main.js?v=5|main.js?v=6|' /var/www/www.journeyways.ca/*.html
```

## Boundaries

- **Do not modify `/var/www/play.journeyways.ca/`** unless the user explicitly says so. The user has stated this directly. Read for reference (mailer.js patterns are similar to `server/index.js`); don't change.
- **No em-dashes anywhere** (prose, HTML entities, code, comments, commit messages). User preference, restated multiple times.
- **`brainstorm/proposal-summary.md` is the source of truth** for site copy work. Don't draft major copy without reading it.
