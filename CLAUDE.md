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
├── css/styles.css          Custom CSS (@font-face, card colours, .tile-wood, marquee, lightbox)
├── css/tailwind.css        Tailwind utilities, locally built (output of tools/)
├── js/main.js              Mobile menu, cookie banner, CTA injection, lightbox (multi-set), contact form
├── img/                    Site images + thumbnails + favicon.png + og-card.jpg
├── img/design/             webp components (tiles, card fronts, card backs)
├── fonts/                  Self-hosted Inter and Italianno (woff2, latin + latin-ext)
├── tools/                  Local Tailwind build (npm run build -> ../css/tailwind.css)
├── download/               Game rules and character sheet PDFs
├── server/                 Express 5 + Nodemailer 8 backend. PM2 app `journeyways-www`. Currently stopped.
├── brainstorm/             Working notes (gitignored, synced to Obsidian vault)
├── sitemap.xml             6 entries with <lastmod>; contact.html intentionally absent
└── .gitignore              Ignores brainstorm/, server/node_modules/, server/.env, server/logs/, tools/node_modules/
```

## How it runs

- **Static pages**: nginx serves `/var/www/www.journeyways.ca/`. Vhost at `/etc/nginx/sites-available/www.journeyways.ca.conf`.
- **Tailwind**: locally built. Source under `tools/` (`tailwind.input.css` + `tailwind.config.js`). Run `cd tools && npm run build` to regenerate `css/tailwind.css` after adding any new utility class. Watch mode: `npm run watch`. Always bump `tailwind.css?v=N` after a rebuild.
- **Fonts**: Inter and Italianno self-hosted under `fonts/` as woff2 (latin + latin-ext subsets). Loaded via `@font-face` declarations at the top of `css/styles.css`. No third-party origins.
- **Backend**: PM2 app `journeyways-www` (script: `server/index.js`, port `127.0.0.1:1985`). Express 5, Nodemailer 8. nginx proxies `/api/` to it. **Currently stopped**; resume with `pm2 start journeyways-www`. See `server/README.md` for details.
- **Cache-busting**: stylesheet and script tags use `?v=N` (currently `tailwind.css?v=5`, `styles.css?v=9`, `main.js?v=8`). Bump on every change since `Cache-Control: max-age=31536000`.

## Operational state (May 2026)

- **`contact.html` is hidden.** Mailgun delivers cleanly to Outlook 365 (status 250, "Queued for delivery"), but the recipient inbox doesn't see them: spam/quarantine on the receiving side. Until that's resolved, the page is `noindex, nofollow`, off the nav, and out of the sitemap. The about page's "Get in touch" section is commented out for now. Backend is stopped.
- **`design.html` (Design philosophy)** is live and in the main nav. Anchored sections (`#identity`, `#no-winning`, `#consent`, `#elicit`, `#combination`, `#expression`, `#materials`, `#framework`, `#shared`, `#closing`) are linked inline from `about.html` paragraphs. The page uses `.card-COLOR` and `.tile-wood` for category-name highlighting; both classes live in `css/styles.css`.
- **Lightbox infrastructure** in `js/main.js` supports multiple gallery sets via `openLightboxFromSet(setName, index)`. Sets currently defined: `photos`, `boardgameSetup`, `boardgameTiles`, `boardgameCardFronts`, `boardgameCardBacks`, `videogameCards`, `videogameTiles`. The lightbox modal markup is duplicated in `photos.html`, `boardgame.html`, and `videogame.html`. CSS hides nav arrows when the active set has only one image.
- **Audit pass landed in v1.1.1** (May 2026): self-hosted fonts, local Tailwind build, Express 5 / Nodemailer 8, JSON-LD on every page, og-card.jpg replacement of heavy logos, sitemap lastmod, og:image swaps, image webp conversions (saved ~9 MB per first visit), title-tag standardization to `JOURNEYWAYS | <Page>`, boardgame and videogame lightboxes, GRSJ link in About and Design.
- **`server/.env` holds Mailgun SMTP creds and the Cloudflare Turnstile secret.** Values were copied from `/var/www/play.journeyways.ca/.env`. Gitignored. Don't read or echo.
- **`brainstorm/`** is gitignored. A PostToolUse hook in `.claude/settings.local.json` rsyncs it to `~/apps/obsidian/Academic/Journeyways/Website brainstorm/` on every Edit/Write/MultiEdit. If sync drifts, open `/hooks` in Claude Code once to reload.
- **Rollback tag** `pre-copy-rework` (in git) marks the state before the rulebook hero copy and about-page work. `git reset --hard pre-copy-rework` to revert all of that.
- **Google Search Console** verification file `google6fb8a72b75fa8894.html` lives at site root. Don't move or delete it.
- **Thumbnail aspect ratios matter for the lightbox.** The lightbox shows the source file at native aspect; thumbnails should match that aspect or `object-cover` will crop and the click feels jarring. Cards are 700x545 (use `h-56` with `w-72` -> ratio ~1.286), tiles are 900x900 square (use `h-72` with `w-72`). All tile webps in `img/design/` should be 900x900; if a new one is 700x700, re-encode from the original under `~/FileShare/jw/game materials/Map Tiles/` so it matches in the lightbox.

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

# Rebuild Tailwind after adding any new utility class to HTML/JS
cd /var/www/www.journeyways.ca/tools && npm run build
sed -i 's|tailwind.css?v=5|tailwind.css?v=6|' /var/www/www.journeyways.ca/*.html

# Bump other asset cache versions (current: tailwind.css?v=5, styles.css?v=9, main.js?v=8)
sed -i 's|styles.css?v=9|styles.css?v=10|' /var/www/www.journeyways.ca/*.html
sed -i 's|main.js?v=8|main.js?v=9|' /var/www/www.journeyways.ca/*.html
```

## Boundaries

- **Do not modify `/var/www/play.journeyways.ca/`** unless the user explicitly says so. The user has stated this directly. Read for reference (mailer.js patterns are similar to `server/index.js`); don't change.
- **No em-dashes anywhere** (prose, HTML entities, code, comments, commit messages). User preference, restated multiple times.
- **`brainstorm/proposal-summary.md` is the source of truth** for site copy work. Don't draft major copy without reading it.
