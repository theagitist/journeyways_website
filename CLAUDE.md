# CLAUDE.md (www.journeyways.ca)

Operator's quick reference for this site. Pairs with `README.md` (user-facing copy and changelog). Project context for site-copy work lives in the Academia Obsidian vault at `~/apps/obsidian/Academia/Projects/Journeyways/Foundations/`; when editing copy, read `proposal-summary.md` there first.

## What this is

A static HTML site (6 visible pages + 2 hidden + 1 footer-only references page) plus a tiny Node backend in `server/` that handles a contact form. The site is the public face of Adri M.'s master's research at UBC GRSJ; tone is academic-yet-friendly. See `~/apps/obsidian/Academia/Projects/Journeyways/Foundations/proposal-summary.md` for project framing, voice, and content principles.

## Layout

```
www.journeyways.ca/
├── index.html              Home (rulebook hero copy + 3 feature cards + boardgame snapshot)
├── boardgame.html          How to play; rules and components
├── videogame.html          Digital version overview + roadmap (under development). Its dev log moved to updates.html
├── updates.html            Project-wide milestones timeline. Month-grouped flat cards (.jw-card[data-type=board|video|both]) with a game filter (All/Board/Video) + a month tab strip; both driven by main.js initUpdatesFilter(). "both" cards show two tags. CSS is .jw-* in styles.css. Board data from CV (~/apps/Bio-CV) + vault PLAYTESTING.md. 4th main-nav item (after Video Game); in sitemap.
├── components.html         Component hub: 4 cards (Cards, Tiles, Player Booklet, Game Manual) linking to the sub-pages below
├── components-booklet.html / components-manual.html   Player Booklet / Game Manual pages: page-by-page preview (img/booklet/*, img/manual/* rendered from the download PDFs) opening in the shared lightbox (main.js gallerySets booklet/manual), plus a download link. Re-render + ?v-bump these when deploy-web.sh ships new PDFs (see memory project-www-updates-and-components)
├── photos.html             Research gallery + lightbox (6 entries)
├── about.html              About the researcher; bio, project narrative, inline anchors into design.html. "Get in touch" section currently commented out
├── design.html             Design philosophy (long-form essay; 9 principles, illustrated with card and tile artwork; anchored from about.html)
├── references.html         Bibliography (8 thematic chapters, 27 APA 7 citations). Footer-linked from every page; not in main nav. Source list in ~/apps/obsidian/Academia/Projects/Journeyways/Foundations/references.md
├── presentation.html       Standalone conference deck (15 slides). `noindex, nofollow` (linkable but not search-indexed). Linked from the About hero bar. Self-contained inline CSS+JS, no external slide framework
├── contact.html            Contact form (HIDDEN: noindex, not in nav, not in sitemap)
├── css/styles.css          Custom CSS (@font-face, card colours, .tile-wood, marquee, lightbox)
├── css/tailwind.css        Tailwind utilities, locally built (output of tools/)
├── js/main.js              Mobile menu, cookie banner, CTA injection, lightbox (multi-set), contact form
├── img/                    Site images + thumbnails + favicon.png + og-card.jpg
├── img/design/             webp components (tiles, card fronts, card backs)
├── fonts/                  Self-hosted Inter and Italianno (woff2, latin + latin-ext)
├── tools/                  Local Tailwind build (npm run build -> ../css/tailwind.css)
├── download/               Rulebook and Player Booklet PDFs (Ghostscript-optimized via /ebook setting)
├── api/                    Dependency-free contact handler (`contact.php`) + config sample
├── inc/ partials/ templates/ lang/ 404.php index.php   PHP i18n front-controller stack
├── legacy-html/            Pre-refactor static page HTML, parked as a rollback fallback
├── sitemap.xml             Per-language entries with hreflang; contact intentionally absent
└── .gitignore              Ignores tools/node_modules/, api/www-config.php
```

## How it runs

- **Pages**: nginx serves `/var/www/www.journeyways.ca/` with `index index.php`; real files serve directly, everything else falls through `try_files` to the `index.php` front controller (see Localization below). Vhost at `/etc/nginx/sites-available/www.journeyways.ca.conf`; the committed reference copy is `deploy/nginx-www.journeyways.ca.conf`.
- **Tailwind**: locally built. Source under `tools/` (`tailwind.input.css` + `tailwind.config.js`). Run `cd tools && npm run build` to regenerate `css/tailwind.css` after adding any new utility class. Watch mode: `npm run watch`. Always bump `tailwind.css?v=N` after a rebuild.
- **Fonts**: Inter and Italianno self-hosted under `fonts/` as woff2 (latin + latin-ext subsets). Loaded via `@font-face` declarations at the top of `css/styles.css`. No third-party origins.
- **Backend**: the contact form is `api/contact.php`, run by php-fpm (nginx routes `location = /api/contact` to `unix:/run/php/php8.3-fpm.sock`). No Node: the old Express `journeyways-www` PM2 app was deleted at the 2026-07-10 cutover. Secrets in `/etc/journeyways/www-config.php` (out of docroot).
- **Cache-busting**: stylesheet and script tags use `?v=N` (currently `tailwind.css?v=25`, `styles.css?v=23`, `main.js?v=20`). Bump on every change since `Cache-Control: max-age=31536000`.

## Localization (PHP i18n refactor, LIVE since 2026-07-10)

The site has been refactored from copy-pasted static HTML to a lean **PHP-FPM**
server-render so it can localize to es/fr (N-language-ready) with SEO-optimal
per-language URLs. **LIVE as of 2026-07-10** (the vhost cutover is done; the old
static pages are parked in `legacy-html/` as a rollback fallback). All 14 content pages are
on the new stack: 12 trilingual (home, board game, about, design, video game, updates,
references, photos, components hub, manual, booklet, contact) and 2 English-only (the
cards + tiles galleries render English `/api` data). The contact form is ported to
`api/contact.php`. Full plan + as-built: memory `project_www_php_i18n`, vault
`Website localization (PHP i18n)`.

- **Routing:** `index.php` is the front controller. It strips a leading `/es` or
  `/fr` from the URL (English is bare, the default), maps the remaining clean path
  via the `inc/pages.php` registry to a template, and renders
  `partials/head.php` + `templates/<page>.php` + `partials/footer.php`. Unknown path
  or a language a page is not published in -> `404.php`.
- **Strings:** `lang/<lang>.json` holds shared chrome (`common`); each page's strings
  live in `lang/<lang>/<page>.json` (nested under `pages.<page>` at load), and
  `lang/<lang>/js.json` holds the JS-facing strings injected as `window.__I18N`.
  English is the source of truth; es/fr deep-merge over it (missing key -> English).
  `t('a.b.c')` / `te()` (escaped) / `jw_get()` (raw arrays) live in `inc/i18n.php`,
  with `jw_url()` (localized URL) and `jw_page_url()` (localized when the target page
  is published in that lang, else the English static path, for phased rollout).
  `main.js` (`?v=22`) reads `window.__I18N` via `jwUI()` and overlays localized
  `gallery[set][i]` captions onto its built-in English `gallerySets`.
- **SEO:** every page is self-canonical, with reciprocal `hreflang` (+ `x-default`
  = English) built from the langs each page declares in `inc/pages.php`. Translate
  the invisibles too (title/description/OG/JSON-LD/`<html lang>`/`alt`). No
  auto-redirect: a dismissible Accept-Language suggestion banner + a nav switcher.
- **Publishing gate:** add a language to a page's `langs` in `inc/pages.php` ONLY
  when that page is fully translated, so no half-translated page is ever indexed.
- **Assets are root-absolute** (`/css/...`, `/img/...`) because `/es/` and `/fr/`
  pages live one level deep; relative paths would break.
- **Tailwind:** `tools/tailwind.config.js` now globs `../templates/**/*.php` +
  `../partials/**/*.php`; the prebuilt `css/tailwind.css` only holds classes seen at
  its last build, so rebuild (`cd tools && npm run build`) before relying on any NEW
  class added in a PHP file (Phase 0 reused existing classes, so no rebuild needed).
- **Dev test (no nginx):** `cd www && php -S 127.0.0.1:8899 <router>` where the router
  mimics nginx `try_files` (serve real files, else `index.php`); it must `realpath()`
  the docroot since `www` is a symlink. Then `curl`/screenshot `/`, `/es/`, `/fr/`.
- **sitemap.xml is generated** from the route registry by `php bin/gen-sitemap.php`
  (rerun after editing `inc/pages.php`): localized routes get reciprocal `xhtml:link`
  hreflang + x-default; not-yet-ported English pages stay single-entry.
- **Dev-test all pages (no nginx):** `cd www && nohup php -S 127.0.0.1:8899 <router> & disown`
  where the router routes `/` + `*.html` to `index.php` and `realpath()`s the docroot
  (www is a symlink); then `curl`/screenshot `/`, `/es/…`, `/fr/…`.
- **Contact form:** `api/contact.php` (dependency-free: validation, honeypot,
  Turnstile, file-based per-IP rate limit, authenticated SMTPS, localized errors from
  the contact dict via a `lang` field). Run its CLI self-test with `php api/contact.php`.
  Secrets live in `/etc/journeyways/www-config.php` (out of docroot, `0640`); shape in
  `api/www-config.sample.php`. `main.js` (`?v=23`) posts `lang` and localizes statuses.
- **Cutover DONE 2026-07-10** (`deploy/CUTOVER.md` is the runbook + rollback of record):
  the vhost from `deploy/nginx-www.journeyways.ca.conf` is live (php-fpm front controller
  + `/api/contact` handler + source denies, keeping the play `/api/cards|tiles` proxies);
  `/etc/journeyways/www-config.php` holds the ZeptoMail token + Turnstile secret (Turnstile
  secret also backed up at `~/apps/keys/journeyways-turnstile-secret`); the 14 page `*.html`
  are in `legacy-html/`; the Node `server/` + `journeyways-www` PM2 app were deleted.
  **Rollback** any time: `git mv legacy-html/*.html .`, restore the pre-cutover vhost from
  `/etc/nginx/sites-available/www.journeyways.ca.conf.bak-*`, reload. **Deferred:** localize
  the cards/tiles gallery data so those two pages can publish es/fr (they are English-only).

## Operational state (May 2026)

- **Editorial redesign complete in v1.3.0** (May 2026). All six visible pages (`index.html`, `about.html`, `design.html`, `photos.html`, `boardgame.html`, `videogame.html`) ship in the Swiss-luxury vocabulary. Body sections use the 3+9 chapter spine (Italianno chapter titles in `text-yellow-400` + small watercolor swatches from the boardgame card backs in `img/design/bg-*.webp`), `border-t border-gray-700/40` hairlines, `font-display: block` on Italianno paired with `Inter Fallback` adjusted face. Pattern documented in `brand-spec.md` in the Academia vault under `Journeyways/Foundations/`. Rollback tag `pre-homepage-redesign` at commit `6a46e15` reverts the rollout.
- **Hero variations are intentional, not mistakes.** Each page's hero deliberately differs from the others (user explicitly asked for this): home/about use 7/5 split with image right + `hero-mask`; design.html uses 5/7 split with image LEFT + `hero-mask`; photos.html has NO hero image, just a typographic title block + 4-photo tile band beneath; boardgame.html uses a 5/7 split with the rulebook cover (portrait, no `hero-mask`, `items-start`) + title block. Don't normalize them back into one shared layout.
- **Content rule: "draw" vs "pick".** Players "pick" cards and tiles, never "draw" them. The verb "draw" is reserved for actual illustrating in this game (sticky-note tiles, journal doodles, comic panels, hand-drawn art). Applies site-wide. Phrases like "drawn from a small canon" (= sourced from) and "Hand-drawn" alt text describing artwork are fine.
- **Decks chapter on boardgame.html is sized to match the previous, pre-redesign card-back row.** `max-w-4xl` wrapper + `grid-cols-3 md:grid-cols-5 gap-3` + `aspect-[3/4]` + simple `text-xs italic` captions in the `<span class="card-X">Color</span> | Category` form. The user reverted multiple smaller-card attempts to this exact size; do not shrink them again without explicit instruction.
- **Tailwind `space-y-*` + sr-only h2 trap.** A `<h2 class="sr-only">` as the first DOM child of a `space-y-*` container creates a phantom `margin-top: 3rem` on the first visible sibling because the sr-only element still occupies the "first child" slot in the sibling combinator. Use explicit `mt-12 md:mt-14` on subsequent siblings instead of `space-y-*` when an sr-only heading is present. Bit me on the Gameplay section of the home redesign.

- **Contact page + form are live.** The form posts to `api/contact.php`, which sends via ZeptoMail SMTPS (`no-reply@journeyways.ca` -> `aemjcr@gmail.com`) with Cloudflare Turnstile enforced (Mailgun was retired project-wide 2026-06-24; the old Node backend is gone). The page is kept **`noindex`** and out of the sitemap by design (`meta.robots` in `lang/*/contact.json`); it is reachable directly and via the nav language stack. A real end-to-end send needs a browser (Turnstile is domain-locked, so curl cannot mint a token); validation, Turnstile-rejection, and honeypot paths are curl-verifiable.
- **`design.html` (Design philosophy)** is live and in the main nav. Anchored sections (`#identity`, `#no-winning`, `#consent`, `#elicit`, `#combination`, `#expression`, `#materials`, `#framework`, `#shared`, `#closing`) are linked inline from `about.html` paragraphs. The page uses `.card-COLOR` and `.tile-wood` for category-name highlighting; both classes live in `css/styles.css`.
- **`references.html` (Bibliography)** is live but intentionally **not in the main nav**. Discoverability: footer link on every page (the only footer link styled `text-yellow-400 hover:text-yellow-300` at rest, breaking the usual "yellow only on hover" rule), hero link bar on `about.html` and `design.html` ("Design philosophy &middot; References &middot; UBC GRSJ" and "About the researcher &middot; References &middot; UBC GRSJ"), inline link in the openness paragraph of `about.html`. Eight thematic chapters with anchor IDs (`#theory`, `#data`, `#arts-based`, `#ethnography`, `#analysis`, `#games`, `#co-creation`, `#pedagogy`) on the editorial chapter spine. Citations are APA 7 in a `<ul class="space-y-5 text-gray-300 text-[15px] md:text-base leading-relaxed">`; book/journal titles wrapped in `<em>`; DOIs use the standard inline link pattern with `break-words` so long DOIs wrap on mobile. Source list (with thematic groupings + full citations) lives in the Academia vault at `~/apps/obsidian/Academia/Projects/Journeyways/Foundations/references.md`. When adding entries, keep sentence case for titles, expand publishers without legal designations (e.g. "Sage Publications" not "SAGE Publications Ltd."), and only add DOIs that are verified to exist (Seal Press / Bloomsbury / Pearson trade titles generally don't have DOIs).
- **`presentation.html` is the conference deck** (renamed from `pitch.html` in May 2026; "pitch" was deemed too promotional). `noindex, nofollow` (linkable from the site, not indexed by search engines). Linked from the About hero bar between References and UBC GRSJ; included in the sitemap with priority 0.5. 15 slides, mirrors the narrative arc of the JOURNEYWAYS conference video. Self-contained: inline `<style>` defines the slide system, inline `<script>` handles all behaviour. The deck reuses the editorial pattern (Italianno chapter titles in `text-yellow-400`, watercolor swatches from `img/design/bg-*.webp`, `border-t border-gray-700/40` hairlines) but does not include the standard nav; only a top-left "← JOURNEYWAYS" link back to home, plus a slide counter top-right.
  - **Keyboard.** Arrows / space / PageUp / PageDown / Home / End for navigation. `1`–`9` digits jump to a slide (multi-digit input buffered ~700ms; commits early when no longer-number could fit). `O` opens the slide overview (a full-screen grid of all 15 slide cards, built at init by reading each slide's chapter title and h2). `S` toggles inline speaker notes; `?notes` URL flag opens with notes visible. `F` fullscreen. `P` print to PDF. `W` opens the presenter window. `Esc` closes overview / presenter.
  - **Presenter mode.** `?presenter=1` renders a different layout: chapter, h2, full speaker notes, "Up next" panel with the next slide's chapter and h2, and a session timer (`R` resets, `Esc` closes the popup window). `W` from the main deck opens the presenter window with the current hash preserved. Both windows stay synced via `BroadcastChannel('journeyways-deck')`: arrow keys and digit jumps in either advance both. Suppression flag prevents broadcast ping-pong. Falls through gracefully if `BroadcastChannel` is unavailable.
  - **Bottom hint legend** is hidden by default and revealed only when the cursor enters the bottom 64 px of the viewport (mouse-area-only: no reveal on keypress, which the user found distracting).
  - **Speaker-note typography.** The h4 ("Slide title · ~Ns") uses Inter as a yellow uppercase eyebrow line; Italianno was unreadable at notes sizes. Body text is 1rem (inline) and clamp(1.05rem, 1.35vw, 1.25rem) (presenter window) at line-height 1.6. **Italianno legibility floor**: only use Italianno for elements ≥ ~2.5rem (cover title, chapter spine titles, timeline `when` labels, thanks mark). For column subheadings (`.col h3`) and notes use Inter.
  - **Print** stylesheet (`@media print` with `@page { size: 16in 9in }`) lays each slide out as a 16:9 page so any browser's "Print to PDF" produces a clean shareable deck.
  - **Slide-specific CSS variants:** `.timeline.four` for the four-phase methodology grid on slide 12; `.card-front-row.four` for four card examples on slide 7; specificity overrides on `.card-back .label.card-COLOR` so slide 6 pile labels can use the site-wide `.card-COLOR` classes from `css/styles.css` against the white-default of `.card-back .label`.
  - **Closing slide** has a faded `og-card.webp` echo as a bookend (`.closing-mark`) and a QR code (`img/qr-journeyways.svg`) generated white-on-`#111827` via `qrencode --foreground=ffffff --background=111827` so it sits flush against the slide background. Cache-busted via `?v=N` on the img src; bump if regenerated.
  - **Reference materials** live in the private `journeyways_original_assets` repo at `~/apps/journeyways/original_assets/pitch/` (mp4 video, pptx slides, m4a podcast, infographic png). Card prompt copy on slide 7 sourced from `~/apps/journeyways/original_assets/boardgame/cards/Cards.docx`.
- **Lightbox infrastructure** in `js/main.js` supports multiple gallery sets via `openLightboxFromSet(setName, index)`. Sets currently defined: `photos`, `boardgameSetup`, `boardgameTiles`, `boardgameCardFronts`, `boardgameCardBacks`, `videogameCards`, `videogameTiles`. The lightbox modal markup is duplicated in `photos.html`, `boardgame.html`, and `videogame.html`. CSS hides nav arrows when the active set has only one image.
- **`brand-spec.md` lives in the Academia vault** at `~/apps/obsidian/Academia/Projects/Journeyways/Foundations/brand-spec.md`. Canonical there. Was previously served publicly at `https://www.journeyways.ca/brand-spec.md` and footer-linked from every page; removed from the repo and the footer on 2026-05-12 because the project is working exclusively in vault notes until HTML-rendered governance docs are restored (see `Website Specific/Documentation/ROADMAP.md` in the vault). The nginx `location = /brand-spec.md` exception in the vhost was removed in the same change. When the rendering pipeline lands, brand-spec returns to the public surface in HTML form. Until then, downstream references to the public URL (play-side `CLAUDE.md`, play-side `docs/COMPLIANCE.md`) will 404; this is expected and is the user's stated interim state.
- **Audit pass landed in v1.1.1** (May 2026): self-hosted fonts, local Tailwind build, Express 5 / Nodemailer 8, JSON-LD on every page, og-card.jpg replacement of heavy logos, sitemap lastmod, og:image swaps, image webp conversions (saved ~9 MB per first visit), title-tag standardization to `JOURNEYWAYS | <Page>`, boardgame and videogame lightboxes, GRSJ link in About and Design.
- **`server/.env` holds Mailgun SMTP creds and the Cloudflare Turnstile secret.** Values were copied from `/var/www/play.journeyways.ca/.env`. Gitignored. Don't read or echo.
- **Project context (proposals, interview, bibliography source, parked questions, etc.)** lives in the Academia Obsidian vault at `~/apps/obsidian/Academia/Projects/Journeyways/Foundations/`. A `brainstorm/` directory used to live inside this repo as a working copy, gitignored and roughly mirrored to the vault; it was deleted on 2026-05-12 because the two were drifting and the vault is the single source going forward.
- **Website open work** is split across two files in the vault. `~/apps/obsidian/Academia/Projects/Journeyways/Website Specific/Documentation/ROADMAP.md` holds new features and eventual work (vault-to-HTML rendering pipeline, contact-form backend resume, trilingual content, print-derivative typography). `~/apps/obsidian/Academia/Projects/Journeyways/Website Specific/Documentation/BACKLOG.md` holds security, stability, and privacy items that must be implemented (CSP tightening, inline script extraction). Check both when looking for open work; the BACKLOG is the integrity-commitment list, the ROADMAP is the feature list. Parallel ROADMAP and BACKLOG pairs exist for each surface at `Boardgame Specific/Documentation/`, `Videogame Specific/Documentation/`, and `Research Specific/Documentation/`; items that span surfaces are tracked where the primary work lands and cross-linked.
- **Governance docs are not in this repo.** Brand spec, boardgame compliance / privacy / data-governance / production / playtesting / roadmap all live in the Academia vault. The website temporarily has no governance docs publicly accessible (since 2026-05-12); restoration via an HTML rendering pipeline is the top item in `Website Specific/Documentation/ROADMAP.md`.
- **Rollback tag** `pre-copy-rework` (in git) marks the state before the rulebook hero copy and about-page work. `git reset --hard pre-copy-rework` to revert all of that.
- **Google Search Console** verification file `google6fb8a72b75fa8894.html` lives at site root. Don't move or delete it.
- **Thumbnail aspect ratios matter for the lightbox.** The lightbox shows the source file at native aspect; thumbnails should match that aspect or `object-cover` will crop and the click feels jarring. Cards are 700x545 (use `h-56` with `w-72` -> ratio ~1.286), tiles are 900x900 square (use `h-72` with `w-72`). All tile webps in `img/design/` should be 900x900; if a new one is 700x700, re-encode from the original under `~/apps/journeyways/original_assets/boardgame/map-tiles/` so it matches in the lightbox.

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

# Bump other asset cache versions (versions now vary per page after the updates/components
# work; latest highs 2026-07-09: styles.css?v=31, main.js?v=29). Bump only the pages that
# need the new content; versions across pages need not match.
sed -i 's|styles.css?v=30|styles.css?v=31|' /var/www/www.journeyways.ca/updates.html

# Cloudflare cache (journeyways.ca is proxied): HTML is served DYNAMIC (uncached) so page
# edits go live immediately; but images (img/**) and download/*.pdf ARE cached. Reusing a
# filename serves stale bytes -> cache-bust with ?v=N (used ?v=2 on manual/booklet previews
# + on-site PDF links, 2026-07-09). The ~/apps/keys/cloudflare-token is DNS-scoped and
# CANNOT purge (auth error 10000); a dedicated Cache-Purge token is needed for bare
# /download/*.pdf URLs. See memory reference-www-cache-busting.

# Optimize a PDF in download/ (Ghostscript /ebook ~halves a 11MB scan to ~5MB)
gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook \
   -dNOPAUSE -dQUIET -dBATCH -sOutputFile=out.pdf in.pdf
```

## Cross-project link (www.journeyways.ca ↔ play.journeyways.ca)

The videogame at `/var/www/play.journeyways.ca/` is the digital companion to the boardgame this site documents, and several files here are updated by work originating there. When a session is running in this project and is asked to do something cross-cutting:

- **Files this site receives updates to from `play.journeyways.ca`:**
  - `videogame.html` Recent section: a top `<li>` is added for player-facing material changes (game-wide style, palette, fonts, major UX). Each item carries a month/year eyebrow above the title (`<p class="text-[10px] uppercase tracking-[0.2em] text-yellow-400/70 mb-1">Month YYYY</p>`); use the current month when shipping. Skip routine bug fixes and internal refactors.
  - `videogame.html` spec strip and JSON-LD: `Version`, `Tagged` (month/year), and the JSON-LD `softwareVersion` should match the play-side version on its release.
- **`brand-spec.md` no longer lives in this repo.** Canonical version is in the Academia vault at `~/apps/obsidian/Academia/Projects/Journeyways/Foundations/brand-spec.md`. Edits land in the vault, not here. Until the rendering pipeline restores HTML governance docs (tracked in `Website Specific/Documentation/ROADMAP.md` in the vault), play-side links to `https://www.journeyways.ca/brand-spec.md` will 404; this is expected.
- **When invoked from the play-side, that project's CLAUDE.md and memory dir already document the cross-repo rules.** When invoked from THIS side and the user references the videogame, also read:
  - `/var/www/play.journeyways.ca/CLAUDE.md`
  - `/home/theagitist/.claude/projects/-var-www-play-journeyways-ca/memory/`
- **Reciprocal rules.** The play-side imports the same content rules that govern this site (no em-dashes, Italianno legibility floor, "pick" not "draw"). Those memories live in `/home/theagitist/.claude/projects/-var-www-www-journeyways-ca/memory/` and are the source of truth.

## Boundaries

- **Do not modify `/var/www/play.journeyways.ca/`** unless the user explicitly says so. The user has stated this directly. Read for reference (mailer.js patterns are similar to `server/index.js`); don't change.
- **No em-dashes anywhere** (prose, HTML entities, code, comments, commit messages). User preference, restated multiple times.
- **`~/apps/obsidian/Academia/Projects/Journeyways/Foundations/proposal-summary.md` is the source of truth** for site copy work. Don't draft major copy without reading it.
