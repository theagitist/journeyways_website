# JOURNEYWAYS Website

Public-facing site for JOURNEYWAYS, a master's research project at the UBC Institute for Gender, Race, Sexuality and Social Justice (GRSJ). The project uses a board game and a digital game in development as research instruments to study how people self-identify when given a narrative-driven, safe, collaborative play space.

This repository holds the static site (`www.journeyways.ca`) and a small Node.js backend for a contact form.

## About JOURNEYWAYS

JOURNEYWAYS is not about winning or losing; it's about discovering, exploring, and becoming. Whether playing solo or as part of a group, each session creates a space for exploring identity and agency beyond predefined categories.

The project is also a *framework*. Map tiles, cards, and a player booklet are the canonical triad; default content is gender-identity-focused but the engine is for identity exploration in general. Anyone is encouraged to author their own variant.

## Pages

- **Home** (`index.html`). Editorial Swiss-luxury layout. Asymmetric hero anchored by the watercolor `og-card.webp` on the right; three hairline-divided chapter cards (No Fixed Roles, Collaborative Storytelling, Continuous Growth) opening themed native `<dialog>` popups; 3+9 chapter spine on the body sections (Italianno script titles with watercolor card-back swatches: Principles / Gameplay / Recent / Begin); contained components photo with a single-image lightbox; outline-button closing block. The marquee was retired in favor of a dated Recent rail lower on the page.
- **Board Game** (`boardgame.html`). How to play. Editorial hero with the printed rulebook cover (`img/rulebook_cover.webp`) on the left + title block on the right + inline PDF download links with file sizes. Body chapters on the 3+9 spine: Decks (5 card backs), Setup (components + initial steps + setup photo), Turn (3-phase grid + 12 map tiles + 9 card fronts), Ending (with pull quote), Journal, Modes (solo vs group), Open play.
- **Video Game** (`videogame.html`). Dev log for the digital version. Centered typographic hero with a horizontal hairline-grid spec strip (Version / Tagged / Platform / Players / Languages / Source) and a "private during development, public at release" footnote. Body chapters on the 3+9 spine: Premise, Built (6-up hairline grid), Recent (timeline list), Next (timeline list).
- **Design philosophy** (`design.html`). Long-form essay: nine principles drawn from a 53-question interview with the designer, illustrated with card and tile artwork. Anchored sections are linked inline from the About page.
- **Photos** (`photos.html`). Research gallery and lightbox.
- **About** (`about.html`). Researcher bio, project narrative, and inline anchor links into the Design philosophy principles.
- **References** (`references.html`). Bibliography behind the project: 8 thematic chapters (Theory / Data / Arts-based / Ethnography / Analysis / Games / Co-creation / Pedagogy), 27 APA 7 citations with DOIs and dissertation/conference details. Footer-linked from every page; intentionally not in the main nav. Source list is `brainstorm/references.md`.
- **Pitch** (`pitch.html`). Hidden work-in-progress conference deck. `noindex`, off the nav, off the sitemap, no inbound links anywhere on the site. Reachable only by direct URL while the content is being iterated on. Will be linked from the About hero bar when ready to publish.
- **Contact** (`contact.html`). Hidden (`noindex`, off the nav, off the sitemap) until the deliverability issue is resolved.

## Site structure

```
www.journeyways.ca/
├── index.html, boardgame.html, videogame.html, photos.html
├── about.html, design.html, references.html, pitch.html, contact.html
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
├── sitemap.xml              7 entries; contact.html and pitch.html intentionally absent
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

- **Cache-busting** is handled via query-string version on stylesheets and scripts. Current versions: `tailwind.css?v=25`, `styles.css?v=23`, `main.js?v=20`. Bump on every CSS/JS change because asset cache lifetime is one year.
- **Font preloading** is set up in every HTML head (`<link rel="preload">` for Inter 400, Inter 600, Italianno 400 latin subsets) so first paint isn't a flash of fallback typography. `Italianno` uses `font-display: block`; Inter uses `font-display: swap` paired with an adjusted `Inter Fallback` face (local Arial with `size-adjust` and ascent/descent overrides) so the swap is layout-neutral and visually subtle.
- **Contact backend** lives in `server/`. PM2 app `journeyways-www` on `127.0.0.1:1985`. Currently stopped due to recipient-side spam quarantine. Resume with `pm2 start journeyways-www`.
- **brainstorm/** is gitignored and auto-synced to an Obsidian vault via a PostToolUse hook in `.claude/settings.local.json`.
- **Google Search Console** verified via `google6fb8a72b75fa8894.html` at the site root.

## Changelog

### 1.3.2 (May 2026) — pitch deck (hidden, work in progress)

- **New `pitch.html`.** Standalone conference deck synthesized from the website copy plus the 53-question designer interview in `brainstorm/answers.md`. Currently hidden while content is iterated on.
  - **Hidden status.** `noindex, nofollow`, off the nav, off the sitemap, no inbound links anywhere on the site. Reachable only by direct URL. Will be linked from the About hero bar when ready to publish.
  - **Self-contained.** Inline `<style>` block defines the slide system; inline `<script>` handles keyboard navigation (arrow keys, space, Home/End, F fullscreen, S speaker notes toggle, P print) plus touch swipes and URL hash sync. No Reveal.js or any other slide framework.
  - **Editorial pattern preserved.** Italianno chapter titles in `text-yellow-400`, watercolor swatches from `img/design/bg-*.webp` above each chapter, `border-t border-gray-700/40` hairlines. The components slides use the actual tile, card-back, and card-front images from `img/design/`, plus a playtest journaling photo.
  - **Print-to-PDF support.** `@media print` with `@page { size: 16in 9in; margin: 0 }` lays each slide out as a 16:9 page so any browser's "Print to PDF" produces a shareable deck. No external dependency for PDF export.
  - **Speaker notes** hidden by default; toggle with `S` or open with `?notes`.
- No CSS rebuild needed; styles are inline. `tailwind.css?v=25`, `styles.css?v=23`, `main.js?v=20` unchanged.

### 1.3.1 (May 2026) — references page

- **New `references.html`.** Bibliography behind the project, in the editorial register: typographic-only hero, eight thematic chapter sections (Theory / Data / Arts-based / Ethnography / Analysis / Games / Co-creation / Pedagogy) with watercolor swatches and Italianno script titles, 27 APA 7 citations rendered as a `<ul>` with sentence-case titles and DOIs. Source list lives in `brainstorm/references.md` (gitignored).
- **Discoverability without nav crowding.** Footer link added on every page (the one footer link styled `text-yellow-400` at rest, breaking the "yellow only on hover" rule); hero link bar on About and Design now lists References alongside the existing links; About also gains an inline link in the openness paragraph. Intentionally not in the main nav, to keep the six-link visible nav from sprawling.
- **APA 7 audit pass.** Fixed sentence-case titles (Butler, McDermott), added verified DOIs for Butler 1999, Ritterfeld 2009, Gobet 2004; completed venue for Monteiro-Krebs (CHI EA '24), volume/issue/article number for Hines 2023; reformatted McDermott as a proper dissertation entry (Ohio State / ProQuest); cleaned publisher names per APA conventions (Sage, Springer, Pearson).
- **`brand-spec.md`** documents the bibliography list pattern and the always-yellow footer exception.
- Tailwind rebuilt for `break-words` and `text-[15px]`. Bump `tailwind.css?v=24` → `?v=25` site-wide.
- Sitemap updated to 7 entries with `references.html` (priority 0.6) and lastmod 2026-05-05.

### 1.3.0 (May 2026) — editorial rollout complete

Wraps the v1.2.x editorial Swiss-luxury redesign that started with the homepage. All six visible pages now ship in the new register.

- **boardgame.html** redesigned. New hero: 5/7 split with the printed rulebook cover (`img/rulebook_cover.webp`, encoded from the JOURNEYWAYS Game Rules PDF cover) on the left + title block on the right at `items-start`. Inline CTAs with precise PDF sizes ("Download Rulebook (PDF, 585 KB)" / "Download Player Booklet (PDF, 5.2 MB)"). Body restructured into chapter-spine sections: Decks, Setup, Turn, Ending, Journal, Modes, Open play. Map tiles section grew from 4 to 12 examples; card fronts grew from 3 to 9. Yellow "Ready to play?" CTA section retired (download links live in the hero now).
- **videogame.html** redesigned. First centered typographic hero on the site (no asymmetric split), with a horizontal hairline-grid spec strip (Version / Tagged / Platform / Players / Languages / Source) in monospace. Body chapters: Premise, Built (6-up hairline grid), Recent and Next (left-border timeline lists). Card and tile figures removed since they appear on boardgame now.
- **PDF rename + optimization.** `JOURNEYWYS Character Sheet 1.0.pdf` (the typo'd "character sheet" that is actually the player booklet) renamed to `JOURNEYWAYS Player Booklet 1.0.pdf`. Both PDFs optimized with Ghostscript `/ebook` setting: Game Rules 2.2 MB → 585 KB, Player Booklet 11 MB → 5.2 MB.
- **Content rule (site-wide).** "Draw" → "pick" anywhere it means selecting a card or tile from a pile (body text, alt text, JSON-LD). "Draw" / "drawn" preserved where it means illustrating ("draw a comic", "tiles can be drawn on") or sourcing ("drawn from a small canon") or describing artwork ("Hand-drawn map tile").
- **Per-page hero variations are intentional**, not mistakes. Documented in `CLAUDE.md` and the user's memory: each of the six pages has its own hero treatment so the site doesn't read as one layout reskinned six times.
- **6 new map tile webps** encoded from `~/FileShare/jw/game materials/Map Tiles/`: Abandoned Playground, Buried Names Field, Childhood House, Mountain Peak, Tree Hollow, Volcanic Ground.
- **Bump** cache keys to `tailwind.css?v=24`, `styles.css?v=23`, `main.js?v=20`. `VERSION` and footer markers to 1.3.0.

### 1.2.0 (May 2026) — editorial redesign of the homepage

- **Homepage rebuilt** as an editorial Swiss-luxury layout:
  - Asymmetric hero. Small `A research project · UBC GRSJ` kicker, Italianno wordmark, italic `A game about becoming.` definition line, lede paragraphs, `Design philosophy` text-link CTA on the left; watercolor `og-card.webp` with a soft radial mask on the right.
  - Marquee retired in favor of a quieter `Recent` rail lower in the page (3+9 chapter spine, dates in `tabular-nums`).
  - Three chapter cards on a hairline-divided grid (`gap-px` over `bg-gray-700/40`) with Lucide glyphs (compass / users / sprout) at top-left, eyebrow + title + body + arrow footer; numeric stamps removed in favor of the icon as the structural mark.
  - Modals restyled to match the cards: themed splotch (red / purple / green) in the top-left header, larger title, italic pull-quote on the principle statement, `Read further` hairline footer with arrow links, top-right close glyph.
  - Body copy and Recent use a 3+9 editorial spine: chapter mark on the left margin (Italianno script title with a small watercolor swatch from the boardgame card backs), body content on the right.
  - Components photo is now a contained `max-w-5xl` editorial figure with a `Game components` kicker / hairline / `Click to enlarge` caption, opening a single-image lightbox (`homeComponents` set in `main.js`).
  - Closing block: `Begin` chapter mark + outline button with arrow, replacing the bright yellow `Ready to Begin?` banner.
- **Nav simplified**: `JOURNEYWAYS` wordmark removed, replaced with a bold `Homepage` link (yellow when on the homepage, white-with-yellow-hover elsewhere) across all 7 pages.
- **Typography polish**: hero gains a definition line between wordmark and lede; chapter titles set in Italianno script (`Principles`, `Gameplay`, `Recent`, `Begin`); Lucide stroke weights refined to 1.25 on decorative icons (arrows stay 1.5 for direction); Recent date labels bumped from `text-[10px] gray-500` to `text-sm gray-300` for contrast.
- **FOUT mitigation**: three font preload links added to the head of every page (Inter 400, Inter 600, Italianno 400, latin subsets); Italianno switched to `font-display: block` so the script never flashes a sans-serif fallback; new `Inter Fallback` adjusted face (local Arial with `size-adjust: 107.4%` and ascent / descent overrides) makes the Inter swap layout-neutral and the visible change subtle. Body font stack is now `'Inter', 'Inter Fallback', sans-serif`.
- **`brand-spec.md`** added at site root, capturing logo, colors, fonts, and UI patterns with a YAML asset manifest.
- **Local-dev redirect guard**: `main.js` only canonicalizes apex → www on `https:`, so file-protocol and localhost inspection no longer bounce to the live site.
- Bump cache keys: `tailwind.css?v=24`, `styles.css?v=23`, `main.js?v=20`.
- Bump `VERSION` and footer markers to 1.2.0.

### 1.1.2 (May 2026) — videogame polish and search console

- **Videogame page:** card thumbnails now use `h-56` (matching the 700x545 aspect) so the framing in the thumbnail equals the framing in the lightbox; `tile-night-way.webp` re-encoded at 900x900 to match the other tiles in the lightbox; reduced the gap between the cards row and the Development Log section, removed the divider; meta description harmonized with the OG description; VideoGame JSON-LD enriched with an `image` array (cards + tiles) and a `publisher` (UBC GRSJ).
- **Google Search Console:** verification file `google6fb8a72b75fa8894.html` placed at site root.
- Bump `tailwind.css` cache key to `?v=5`.
- Bump `VERSION` and footer markers to 1.1.2.

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
