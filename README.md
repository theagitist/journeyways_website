# JOURNEYWAYS Website

Public-facing site for JOURNEYWAYS, a master's research project at the UBC Institute for Gender, Race, Sexuality and Social Justice (GRSJ). The project uses a board game and a digital game in development as research instruments to study how people self-identify when given a narrative-driven, safe, collaborative play space.

This repository holds the static site (`www.journeyways.ca`) and a small Node.js backend for a contact form.

## About JOURNEYWAYS

JOURNEYWAYS is not about winning or losing; it's about discovering, exploring, and becoming. Whether playing solo or as part of a group, each session creates a space for exploring identity and agency beyond predefined categories.

The project is also a *framework*. Map tiles, cards, and a player booklet are the canonical triad; default content is gender-identity-focused but the engine is for identity exploration in general. Anyone is encouraged to author their own variant.

## Pages

- **Home** (`index.html`). Crossfading hero, three feature cards that open native `<dialog>` popups (No Fixed Roles, Collaborative Storytelling, Continuous Growth), and a marquee of dated announcements (CGS-M, ProtoConBC, Critical Play Fellowship).
- **Board Game** (`boardgame.html`). How to play: setup, gameplay phases, ending the game, journaling, solo vs group, advanced concepts, tips. Four illustrated figures: card backs by category, the canonical setup photo, a map-tile gallery, and example card fronts.
- **Video Game** (`videogame.html`). Dev log for the digital version (in development).
- **Design philosophy** (`design.html`). Long-form essay: nine principles drawn from a 53-question interview with the designer, illustrated with card and tile artwork. Anchored sections are linked inline from the About page.
- **Photos** (`photos.html`). Research gallery and lightbox.
- **About** (`about.html`). Researcher bio, project narrative, and inline anchor links into the Design philosophy principles.
- **Contact** (`contact.html`). Hidden (`noindex`, off the nav, off the sitemap) until the deliverability issue is resolved.

## Site structure

```
www.journeyways.ca/
├── index.html, boardgame.html, videogame.html, photos.html
├── about.html, design.html, contact.html
├── css/styles.css           Card colours, .tile-wood, marquee fade,
│                            lightbox, hover transitions
├── js/main.js               Mobile menu, cookie banner, CTA injection,
│                            lightbox, contact form handler
├── img/                     Photos, logo, feature cards, og-card.jpg, favicon
│   ├── design/              webp components: tiles, card fronts, card backs
│   └── thumbnails/          Photos page thumbnails
├── fonts/                   Self-hosted Inter and Italianno (woff2, latin + latin-ext)
├── tools/                   Local Tailwind build (npm run build -> css/tailwind.css)
├── download/                Rules and character-sheet PDFs
├── server/                  Express 5 + Nodemailer 8 backend (contact form, currently stopped)
├── brainstorm/              Working notes (gitignored, synced to Obsidian)
├── sitemap.xml              6 entries; contact.html intentionally absent
└── VERSION
```

## Tech stack

- **HTML5** with semantic markup, OpenGraph and Twitter card metadata, JSON-LD structured data on every page.
- **Tailwind CSS**, locally built under `tools/` (no CDN at runtime). Rebuild with `cd tools && npm run build`.
- **Custom CSS** for the card-color and `.tile-wood` category highlights, lightbox, and marquee animation.
- **Vanilla JavaScript** for the mobile menu, lightbox (set-bounded prev/next, used on photos / boardgame / videogame), native `<dialog>` modals on the home feature cards, and the contact form handler.
- **Inter** and **Italianno** self-hosted under `fonts/` as woff2 (latin + latin-ext subsets). No third-party font origins.
- **webp images** for all the design and component figures, optimized at 700-1600px wide depending on use; lightweight `favicon.png` (12 KB) and `og-card.jpg` (211 KB) for social cards.
- **Express 5 + Nodemailer 8 + Cloudflare Turnstile** for the contact form (currently stopped pending deliverability fix).

## Server config

Deployed via nginx on a shared VPS. Site-wide drop-ins (brotli, gzip, server-tokens off) live at `/etc/nginx/conf.d/`. The site-specific config at `/etc/nginx/sites-available/www.journeyways.ca.conf` includes:

```nginx
include snippets/security-hardening.conf;   # dotfile/.md hides + ACME carveout
include snippets/static-cache.conf;         # 1y for fonts/css/js, 30d for images/pdf

# Rate limiting (zone defined globally in conf.d/rate-limits.conf)
limit_req zone=general burst=60 nodelay;

# CSP (Report-Only: observe, refine, then enforce)
add_header Content-Security-Policy-Report-Only "default-src 'self'; ..." always;
```

The CSP currently still permits the Tailwind CDN, Google Fonts, GA4, and Cloudflare Turnstile, but Tailwind is now built locally and fonts are self-hosted, so `https://cdn.tailwindcss.com`, `'unsafe-eval'`, `https://fonts.googleapis.com`, and `https://fonts.gstatic.com` are all candidates to drop on the next CSP pass.

## Operational notes

- **Cache-busting** is handled via query-string version on stylesheets and scripts. Current versions: `tailwind.css?v=5`, `styles.css?v=9`, `main.js?v=8`. Bump on every CSS/JS change because asset cache lifetime is one year.
- **Contact backend** lives in `server/`. PM2 app `journeyways-www` on `127.0.0.1:1985`. Currently stopped due to recipient-side spam quarantine. Resume with `pm2 start journeyways-www`.
- **brainstorm/** is gitignored and auto-synced to an Obsidian vault via a PostToolUse hook in `.claude/settings.local.json`.
- **Google Search Console** verified via `google6fb8a72b75fa8894.html` at the site root.

## Changelog

### Unreleased (May 2026) — videogame polish and search console

- **Videogame page:** card thumbnails now use `h-56` (matching the 700x545 aspect) so the framing in the thumbnail equals the framing in the lightbox; `tile-night-way.webp` re-encoded at 900x900 to match the other tiles in the lightbox; reduced the gap between the cards row and the Development Log section, removed the divider; meta description harmonized with the OG description; VideoGame JSON-LD enriched with an `image` array (cards + tiles) and a `publisher` (UBC GRSJ).
- **Google Search Console:** verification file `google6fb8a72b75fa8894.html` placed at site root.
- Bump `tailwind.css` cache key to `?v=5`.

### 1.1.1 (May 2026) — security, performance, and SEO pass

- **Image optimization:** favicon `logo_bg_only.png` (3.5 MB) replaced with `favicon.png` (12 KB); `boardgame_components.jpeg` (2.9 MB) and `players_in_action.jpeg` (2.3 MB) converted to webp at 1600px (~300 KB each); three `edges_playtest_*.jpg` (~360 KB each) converted to webp at 1200px (~120 KB each); generated `og-card.jpg` (211 KB) for social cards.
- **Self-host Inter and Italianno:** drop Google Fonts; 12 woff2 files under `fonts/` (latin + latin-ext, 5 Inter weights + Italianno).
- **Tailwind Play CDN to local build:** new `tools/` workspace with `tailwindcss@3` devDependency; ~50 KB of runtime JS removed per pageview; output ~16 KB minified, ~3.5 KB brotli.
- **Server dependency upgrades:** Express 4.21 to 5.x; Nodemailer 6.9 to 8.x (resolves four high-severity CVEs in addressparser and SMTP command injection).
- **Boardgame page:** every photo is now a clickable lightbox with set-bounded prev/next (matching the Photos page UX). Refactored `js/main.js` to support multiple gallery sets via `openLightboxFromSet(setName, index)`.
- **Videogame page:** refresh devlog to v0.4.1-alpha state with concrete features and recent milestones drawn from the actual game repo. Add small thumbnails (Wind / Commune cards, Misty Trail / Night Way tiles) with their own lightbox set.
- **Title casing standardized** to `JOURNEYWAYS | <Page>` across all seven pages.
- **JSON-LD structured data** on every page (WebSite, Person, Article, Game, VideoGame, ImageGallery, ContactPage).
- **og:image** swapped from heavy `logo_bg_only.jpg` (376 KB) to `og-card.jpg` (211 KB) on the four pages that needed it.
- **Sitemap:** add `<lastmod>` to every entry.
- **Meta descriptions** on `index.html` and `videogame.html` refreshed away from dated boilerplate.
- **Marquee regression fix:** dropped a `.marquee-container { margin-top: 0 }` rule that started winning over the inline `mt-16` once Tailwind moved to a static stylesheet.
- **GRSJ link** on About and Design pages.
- Bump `VERSION` and footer markers to 1.1.1.

### 1.1.0 (May 2026)

- Add `design.html`, a long-form Design philosophy page with nine named principles, illustrated with extracted card and tile artwork. Anchored from About via inline links.
- Add the Design link to the main navigation across all pages.
- Convert the home feature cards into clickable native `<dialog>` popups with light copy and links into the Design philosophy anchors.
- Refresh About copy: link the GRSJ institute, add inline anchors into design.html, voice tweaks. Hide the "Get in touch" section until the contact channel is functional.
- Add the four missing card-back textures (red, green, blue, purple) alongside the existing black; introduce `.tile-wood` and reuse `.card-COLOR` classes for category-name highlighting on Board Game and Design pages.
- Add four illustrated figures to the Board Game page: card backs row, setup photo, map-tile grid, card-fronts row.
- Switch body background from `bg-gray-900` to `bg-gray-800` sitewide.
- Strip "© 2025-2026" from every footer.
- Bump asset cache key `styles.css?v=5` → `?v=6`.
- Bump `VERSION` and footer markers to 1.1.0.

### 1.0.0 (early 2026)

- First public release: home, board game, video game, photos, about; hidden contact form behind a Node backend.
- Replaced Adobe Typekit with free Google Fonts.
- Implemented marquee crossfade and dated entries on home.
- Initial nginx hardening: brotli, gzip, server-tokens off, static-cache snippet, rate limiting, CSP Report-Only.

## License

JOURNEYWAYS. A game about becoming. Rooted in research at UBC GRSJ.

The project will be released openly: rules, components, mechanics, and digital code under their respective licences (Creative Commons for content, an OSI-approved licence for code; specifics determined at publication time).
