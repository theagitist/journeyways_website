# JOURNEYWAYS brand spec

A reference for the visual identity of `www.journeyways.ca`. Captures what the site is doing today (v1.4.0, May 2026). Use this when extending the site, building companion materials, or briefing collaborators.

The site has gone through three substantive cycles since v1.1.2:
- **v1.2.0–v1.3.0** introduced the editorial Swiss-luxury vocabulary across all six visible pages (home, about, design, photos, boardgame, videogame).
- **v1.3.1** added `references.html`, a typographic-only bibliography page reachable via the footer.
- **v1.4.0** added `presentation.html`, a self-contained 15-slide conference deck with a presenter window mode.

The editorial pattern (chapter spine with Italianno script title + watercolor swatch + sentence-case h2) and the presentation slide system are documented in §5 below.

---

## 0. Asset manifest (machine-readable)

All paths below are real and verified against the filesystem. Filesystem paths are absolute; web paths are relative to `https://www.journeyways.ca/` and to the site root `/var/www/www.journeyways.ca/`.

> **No SVG exists.** The logo is a raster watercolor. There is no vector mark, no symbol font, and no icon set. If a tool requires vector input, the master raster is `img/og-card.jpg` (square, ~600x600); a tracing or redraw would need to be commissioned separately.

```yaml
# Logo and identity marks
logo:
  master:
    path: /var/www/www.journeyways.ca/img/og-card.jpg
    web: /img/og-card.jpg
    format: jpg
    aspect: 1:1
    use: Open Graph card, master watercolor reference
  master_webp:
    path: /var/www/www.journeyways.ca/img/og-card.webp
    web: /img/og-card.webp
  background_only:
    path: /var/www/www.journeyways.ca/img/logo_bg_only.jpg
    web: /img/logo_bg_only.jpg
    format: jpg
    use: Hero background on boardgame.html (CSS class .hero-bg)
  background_only_webp:
    path: /var/www/www.journeyways.ca/img/logo_bg_only.webp
    web: /img/logo_bg_only.webp
  vector: null  # No SVG version exists.

favicon:
  path: /var/www/www.journeyways.ca/img/favicon.png
  web: /img/favicon.png
  sizes: [16, 32]
  format: png
  notes: A tighter crop of the logo artwork.

# Wordmark is a typographic mark, not an asset
wordmark:
  text: JOURNEYWAYS
  display_form: Journeyways  # in nav and hero, set in Italianno
  font: Italianno
  weight: 400
  color: "#fbbf24"           # yellow-400
  css_hook: .script-font

# Brand colors (canonical)
colors:
  brand:        "#fbbf24"   # yellow-400, primary accent
  brand_hover:  "#fcd34d"   # yellow-300
  cta_bg:       "#fbbf24"   # amber-400 (Tailwind v3 alias for same hex)
  bg:           "#1f2937"   # gray-800, page background
  bg_deep:      "#000000"   # black, footer + primary buttons
  surface:      "rgba(55,65,81,0.6)"   # gray-700/60, cards and modals
  border:       "#4b5563"   # gray-600
  border_hover: "rgba(251,191,36,0.35)"
  text:         "#ffffff"
  text_muted:   "#d1d5db"   # gray-300
  text_meta:    "#6b7280"   # gray-500
  # Content tokens (boardgame card decks; do not recolor)
  card_black:  "#6b7280"
  card_blue:   "#3b82f6"
  card_green:  "#10b981"
  card_purple: "#8b5cf6"
  card_red:    "#ef4444"
  tile_wood:   "#c9a87c"

# Typography
fonts:
  sans:
    family: Inter
    css_stack: "'Inter', sans-serif"
    weights: [300, 400, 500, 600, 700]
    files:
      - { weight: 300, subset: latin,     path: /var/www/www.journeyways.ca/fonts/inter-300-latin.woff2,     web: /fonts/inter-300-latin.woff2 }
      - { weight: 300, subset: latin-ext, path: /var/www/www.journeyways.ca/fonts/inter-300-latin-ext.woff2, web: /fonts/inter-300-latin-ext.woff2 }
      - { weight: 400, subset: latin,     path: /var/www/www.journeyways.ca/fonts/inter-400-latin.woff2,     web: /fonts/inter-400-latin.woff2 }
      - { weight: 400, subset: latin-ext, path: /var/www/www.journeyways.ca/fonts/inter-400-latin-ext.woff2, web: /fonts/inter-400-latin-ext.woff2 }
      - { weight: 500, subset: latin,     path: /var/www/www.journeyways.ca/fonts/inter-500-latin.woff2,     web: /fonts/inter-500-latin.woff2 }
      - { weight: 500, subset: latin-ext, path: /var/www/www.journeyways.ca/fonts/inter-500-latin-ext.woff2, web: /fonts/inter-500-latin-ext.woff2 }
      - { weight: 600, subset: latin,     path: /var/www/www.journeyways.ca/fonts/inter-600-latin.woff2,     web: /fonts/inter-600-latin.woff2 }
      - { weight: 600, subset: latin-ext, path: /var/www/www.journeyways.ca/fonts/inter-600-latin-ext.woff2, web: /fonts/inter-600-latin-ext.woff2 }
      - { weight: 700, subset: latin,     path: /var/www/www.journeyways.ca/fonts/inter-700-latin.woff2,     web: /fonts/inter-700-latin.woff2 }
      - { weight: 700, subset: latin-ext, path: /var/www/www.journeyways.ca/fonts/inter-700-latin-ext.woff2, web: /fonts/inter-700-latin-ext.woff2 }
  script:
    family: Italianno
    css_stack: "'Italianno', cursive"
    weights: [400]
    files:
      - { weight: 400, subset: latin,     path: /var/www/www.journeyways.ca/fonts/italianno-400-latin.woff2,     web: /fonts/italianno-400-latin.woff2 }
      - { weight: 400, subset: latin-ext, path: /var/www/www.journeyways.ca/fonts/italianno-400-latin-ext.woff2, web: /fonts/italianno-400-latin-ext.woff2 }

# Watercolor illustrations (home + feature cards)
illustrations:
  no_fixed_roles:
    path: /var/www/www.journeyways.ca/img/no_fixed_roles.jpg
    web: /img/no_fixed_roles.jpg
  collaborative_storytelling:
    path: /var/www/www.journeyways.ca/img/collaborative_storytelling.jpg
    web: /img/collaborative_storytelling.jpg
  continuous_growth:
    path: /var/www/www.journeyways.ca/img/continuous_growth.jpg
    web: /img/continuous_growth.jpg

# Game material renders (used on design.html and in lightbox sets)
design_cards:
  dir: /var/www/www.journeyways.ca/img/design
  web_dir: /img/design
  aspect: 700x545
  files:
    - card-box-not-yet.webp
    - card-commune.webp
    - card-echo.webp
    - card-encounter.webp
    - card-map.webp
    - card-memory.webp
    - card-mirror.webp
    - card-reminiscence.webp
    - card-wind.webp

design_tiles:
  dir: /var/www/www.journeyways.ca/img/design
  web_dir: /img/design
  aspect: 900x900
  files:
    - tile-mirror-lake.webp
    - tile-misty-trail.webp
    - tile-night-way.webp
    - tile-singing-cave.webp
    - tile-star-bridge.webp
    - tile-study-room.webp

design_misc:
  meeples:    /img/design/assorted-six-meeples.webp
  bg_black:   /img/design/bg-black.webp   # used as panel background on design.html
  bg_blue:    /img/design/bg-blue.webp
  bg_green:   /img/design/bg-green.webp
  bg_purple:  /img/design/bg-purple.webp
  bg_red:     /img/design/bg-red.webp

# Documentary photographs (research and playtests)
photos:
  dir: /var/www/www.journeyways.ca/img
  web_dir: /img
  pairs:  # full-size webp + jpg fallback; thumbnail under /img/thumbnails/
    - { name: boardgame_components, webp: /img/boardgame_components.webp, jpg: /img/boardgame_components.jpg, thumb: /img/thumbnails/boardgame_components_thumb.jpg }
    - { name: boardgame_setup,      webp: /img/boardgame_setup.webp,      jpg: /img/boardgame_setup.jpg,      thumb: /img/thumbnails/boardgame_setup_thumb.jpg }
    - { name: edges_playtest_board, webp: /img/edges_playtest_board.webp, jpg: /img/edges_playtest_board.jpg, thumb: /img/thumbnails/edges_playtest_board_thumb.jpg }
    - { name: edges_playtest_journaling, webp: /img/edges_playtest_journaling.webp, jpg: /img/edges_playtest_journaling.jpg, thumb: /img/thumbnails/edges_playtest_journaling_thumb.jpg }
    - { name: edges_playtest_table, webp: /img/edges_playtest_table.webp, jpg: /img/edges_playtest_table.jpg, thumb: /img/thumbnails/edges_playtest_table_thumb.jpg }
    - { name: players_in_action,    webp: /img/players_in_action.webp,    jpg: null,                          thumb: /img/thumbnails/players_in_action_thumb.jpg }

# Stylesheet and script entrypoints
stylesheets:
  custom:   /var/www/www.journeyways.ca/css/styles.css        # @font-face, marquee, lightbox, devlog, card-COLOR
  tailwind: /var/www/www.journeyways.ca/css/tailwind.css      # built from tools/
  tailwind_config: /var/www/www.journeyways.ca/tools/tailwind.config.js  # currently theme.extend = {}
scripts:
  main: /var/www/www.journeyways.ca/js/main.js
```

---

## 1. Identity

### Project framing
JOURNEYWAYS is a master's research project at the UBC Institute for Gender, Race, Sexuality and Social Justice. The site is the public face of a board game and digital game used as research instruments. Tone: academic yet friendly, plain-spoken, gentle. Voice favors short sentences and lower-case headings (the only proper-noun all-caps usage is the wordmark JOURNEYWAYS).

### Tagline
> A game about becoming.

Used in the footer, suitable for short bios and OG descriptions.

### Wordmark
- The wordmark is the project name set in **Italianno** (script), color `text-yellow-400` (`#fbbf24`), bold.
- All-caps form **JOURNEYWAYS** appears in body prose, the back-link on the presentation deck, and document titles (`JOURNEYWAYS | <Page>`).
- Mixed-case form **Journeyways** appears in the nav (`text-2xl md:text-3xl`), in editorial hero blocks (`text-7xl md:text-8xl`), and on the presentation deck cover. Both forms are correct in their contexts; do not normalize.
- CSS hook: `.script-font` (defined in `css/styles.css`); the presentation deck uses an inline `.cover` and `.chapter-title` pattern instead, since it ships without the global stylesheet hooks.

### Logo (illustrated mark)
- File: `img/og-card.jpg` (and `og-card.webp`); square master at roughly 600x600.
- Description: a watercolor of two profile silhouettes facing each other. The left profile is rendered in warm tones (red, orange, gold), the right in cool tones (blue, teal, purple). Between them, where the silhouettes meet, the negative space frames a landscape: mountains, water, and pines in dusty pinks fading to deep blue. The composition signals duality, encounter, and inner landscape.
- Favicon: `img/favicon.png` (a tighter crop of the same artwork).
- Background-only variant: `img/logo_bg_only.jpg` (still used as `.hero-bg` on `boardgame.html`).

### Logo usage

**Minimum size.** At less than ~96 px square the two profiles lose their distinction and the watercolor reads as noise. Anything below 96 px should fall back to the favicon (a tighter crop) or to the typographic wordmark.

**Clear space.** Reserve at least one half of the logo's height as breathing room on every side. The hero treatment uses a radial mask (`-webkit-mask-image: radial-gradient(ellipse at center, rgba(0,0,0,1) 65%, rgba(0,0,0,0) 95%)`) to feather the edges into the page background; this is the canonical way to set the logo over the gray-800 / gray-900 surfaces.

**Anchoring rule.** Don't crop tightly past the chin line. The meeting of profiles is the load-bearing element of the mark; cropping it produces an unbalanced "single face" that misrepresents the identity.

**Prohibited modifications.**
- No recoloring. The warm-meets-cool duality carries the meaning.
- No replacing the watercolor texture with flat fills, gradients, or vector traces.
- No outer strokes, drop shadows, or glow effects on the mark itself. (Shadows on the *figure containing* the mark are fine; e.g. the closing-slide bookend uses a faded radial mask.)
- No placement over busy photographs without an opaque or heavily blurred backdrop.
- No standalone use of half the logo (one profile only).
- No rotation, skew, or non-uniform scaling.

**The wordmark stands alone.** When the illustrated mark won't reproduce well (e.g. small print, single-color contexts, embroidery, faxes), the typographic wordmark in Italianno yellow-400 is itself the brand. Do not commission flat redraws of the watercolor for those contexts; use the wordmark instead.

---

## 2. Color palette

All hex values are Tailwind v3 defaults unless noted.

### Primary
| Role | Token | Hex | Notes |
|---|---|---|---|
| Brand accent | `yellow-400` | `#fbbf24` | Wordmark, links, hover targets, marquee bar, CTA banner background |
| Brand accent (hover up) | `yellow-300` | `#fcd34d` | Hover state when yellow-400 is the rest state |
| CTA bg | `amber-400` | `#fbbf24` | Same hex as `yellow-400`; used on the "Ready to Begin?" sections for semantic separation |

### Surface
| Role | Token | Hex | Notes |
|---|---|---|---|
| Page background (site) | `gray-800` | `#1f2937` | `<body>` default on all visible pages |
| Page background (deck) | `gray-900` | `#111827` | `body.pitch` only, on `presentation.html`. Slightly deeper, lets the watercolor swatches and yellow accents sit cleaner on a presented projector |
| Deep surface | `black` | `#000000` | Footer, primary buttons, nav at 50% opacity |
| Card / panel surface | `gray-700/60` | `rgba(55,65,81,0.6)` | Feature cards, modals (interior); also `gray-700/40` for lighter panels |
| Hairline divider | `gray-700/40` | `rgba(75,85,99,0.4)` | Editorial chapter-spine border-tops; deck slide-chapter border-tops; principles list separators |
| Border | `gray-600` | `#4b5563` | Card and modal borders at rest |
| Border (hover) | `yellow-400 @ 35%` | `rgba(251,191,36,0.35)` | Rule sections, gallery items, dev-log cards on hover |

### Text
| Role | Token | Hex |
|---|---|---|
| Body on dark | `white` / `gray-100` | `#ffffff` / `#f3f4f6` |
| Secondary | `gray-200` | `#e5e7eb` |
| Muted prose | `gray-300` | `#d1d5db` |
| De-emphasized | `gray-400` | `#9ca3af` |
| Footer/meta | `gray-500` | `#6b7280` |
| Disabled / version tag | `gray-600` | `#4b5563` |

### Boardgame card colors (semantic, not chrome)
Used inline to highlight category names in body copy. Defined in `css/styles.css` as `.card-COLOR` classes (always bold).

| Class | Hex | Used for |
|---|---|---|
| `.card-black` | `#6b7280` | Black-deck card references |
| `.card-blue` | `#3b82f6` | Blue-deck card references |
| `.card-green` | `#10b981` | Green-deck card references |
| `.card-purple` | `#8b5cf6` | Purple-deck card references |
| `.card-red` | `#ef4444` | Red-deck card references |
| `.tile-wood` | `#c9a87c` | Map-tile references |

These are content tokens, not UI tokens. Don't recolor them; they map to physical components.

---

## 3. Typography

### Families
- **Inter** (sans-serif). Self-hosted woff2 in `fonts/`, weights 300, 400, 500, 600, 700, latin and latin-ext subsets. Body text, all sentence-case h2 headings, principles lists, captions, and any column subheading.
- **Italianno** (script). Self-hosted woff2, weight 400 only. Reserved for display elements that have room to read.

Both are loaded with `@font-face` declarations at the top of `css/styles.css`. Italianno uses `font-display: block` paired with an adjusted `Inter Fallback` face; Inter uses `font-display: swap`. No third-party font origins.

### Italianno legibility floor
**Italianno is unreadable below ~2.5rem.** The script font has thin, organic strokes that disappear at body and column-width sizes. Reserve it for elements that render ≥ ~2.5rem in any responsive state:

- Cover wordmark (home hero, presentation cover)
- Editorial chapter-spine titles (`.chapter-title`, ~`text-4xl` to `text-5xl`)
- Timeline `when` labels on the presentation deck
- The closing thanks mark on the presentation deck

For everything else use Inter. This came up repeatedly in iteration: column subheadings (`.col h3`) and presenter-note h4 lines were originally set in Italianno at ~1.4rem and were unreadable. The fix in both cases was to switch to Inter — either as a regular medium-weight yellow heading, or as an uppercase eyebrow line (`font-size: 0.85rem; letter-spacing: 0.18em; text-transform: uppercase; color: #facc15; font-weight: 500`).

### Scale (as used)
| Element | Classes | Weight |
|---|---|---|
| Hero wordmark (home) | `script-font text-7xl md:text-8xl leading-none` | 700 |
| Nav wordmark | `script-font text-2xl md:text-3xl` | 700 |
| Page H1 | `text-3xl md:text-4xl tracking-tight` | 600 |
| Section H2 | `text-xl` to `text-2xl` | 600 |
| Card title | `text-base font-semibold tracking-wide` | 600 |
| Body lead | `text-base md:text-lg leading-relaxed` | 300 to 400 |
| Body | `text-base leading-relaxed` | 300 to 400 |
| Caption / meta | `text-xs` to `text-sm tracking-wide` (often `uppercase`) | 400 |

Headings use sentence case. Card titles often add `tracking-wide`. Figure captions use `uppercase tracking-wide` at `text-xs`.

### Links
- Inline body links: `text-yellow-400 hover:text-yellow-300 underline underline-offset-2`.
- Nav links: no underline at rest, color shifts to `text-yellow-400` on hover and on the active page.

---

## 4. Layout and spacing

- **Container widths**: `max-w-7xl` for nav, `max-w-6xl` for full-bleed page content, `max-w-3xl` for long-form essays (e.g. `design.html`), `max-w-4xl` for CTA sections, `max-w-2xl` for centered prose paragraphs.
- **Page padding**: `px-4 sm:px-6 lg:px-8` on the nav; `px-4` on most inner content blocks.
- **Top spacing under fixed nav**: `main { padding-top: 5rem; }` globally; `main.home { padding-top: 0; }` on the home page so the hero sits closer to the marquee.
- **Section rhythm**: `py-12` to `py-14` between major sections; `mb-14` below page headers; `space-y-16` between long-form sub-sections.
- **Border radius**: default `rounded` (0.25rem) on cards, buttons, and images. No pill buttons. Avatar/feature thumbs use `rounded-full`.

### Per-page hero variations

The hero block is deliberately different on each page. Don't normalize them back into one shared layout — the asymmetry is part of the editorial vocabulary, signaling that each page has its own tonal job.

| Page | Layout | Image treatment | Notes |
|---|---|---|---|
| `index.html` (home) | 7/5 split, image right | `og-card.webp` with `hero-mask` (radial fade) | The most familiar shape; sets the default the others vary against. |
| `about.html` | 7/5 split, image right | Watercolor self-portrait with `hero-mask` | Same shape as home but a different illustration. |
| `design.html` | 5/7 split, image **left** | A card or tile illustration with `hero-mask` | Mirrored from the home/about layout; signals "this is the essay." |
| `photos.html` | No hero image | Typographic title block + a 4-photo tile band beneath | The only page without an illustrated hero; lets the photographs be the hero collectively. |
| `boardgame.html` | 5/7 split, image left | `rulebook_cover.webp` (portrait, no `hero-mask`, `items-start`) | The only page that uses a hard-edged image, because the rulebook cover *is* a printed cover and showing the bleed is the point. |
| `videogame.html` | Centered typographic hero, no asymmetric split | None | A horizontal hairline-grid spec strip (Version / Tagged / Platform / Players / Languages / Source) in monospace replaces the illustration. |
| `references.html` | Typographic-only, like videogame | None | Sentence-headline + small italic lead, with the editorial chapter spine starting immediately under. |
| `presentation.html` (cover slide) | 5/7 split, image right | `og-card.webp` (image-dominant since v1.4.0) | The deck cover echoes the home hero but flipped to give the watercolor more presence on a projector. |

Mobile collapse: every multi-column hero stacks the image *above* the text on small screens, regardless of whether desktop has the image left or right. This matters for `design.html` and `boardgame.html` whose desktop layouts put the image on the left.

---

## 5. Components and patterns

### Fixed top nav
```
bg-black bg-opacity-50 backdrop-blur-sm fixed top-0 w-full z-50
```
Wordmark on the left in Italianno yellow-400. Desktop links to the right of the wordmark with `space-x-6`. Mobile button uses the yellow-400 hamburger; menu collapses inline beneath the nav.

### Marquee announcement bar
- Sits directly under the nav with `mt-16`.
- Background `#fbbf24`, text black, `text-sm`, `padding: 10px 0`, bottom border `rgba(0,0,0,0.08)`.
- 24s fade-in/out cycle through 4 messages, paused on hover.
- Honors `prefers-reduced-motion: reduce` (collapses to a stacked flex list).
- Inline links inside the marquee are forced to black with underline.

### Feature card (home)
```
bg-gray-700/60 border border-gray-600 rounded p-6 text-center
hover:border-yellow-400 focus:border-yellow-400 transition-colors
```
With a circular `w-24 h-24` thumbnail (`rounded-full overflow-hidden`), title `text-base font-semibold tracking-wide`, body `text-sm text-gray-300`, and a `text-xs text-yellow-400 mt-3 tracking-wide` "Read more" tag. Cards open native `<dialog>` modals.

### Modal (`<dialog class="feature-modal">`)
```
bg-gray-800 text-white rounded p-0 max-w-lg w-full border border-gray-600
backdrop:bg-black/70
```
Inner padding `p-6 md:p-7`. Title in `text-yellow-400 tracking-tight`. Body in `text-gray-300 leading-relaxed`. Footer links use the standard yellow-400 inline-link pattern. Close button: `bg-black text-gray-200 px-5 py-2 rounded hover:bg-gray-700`.

### Primary CTA section ("Ready to Begin?")
- Section: `py-12 bg-amber-400 text-black`.
- Heading: `text-2xl md:text-3xl font-semibold mb-3`.
- Body: `text-base md:text-lg max-w-2xl mx-auto`.
- Button: `inline-block bg-black text-white px-6 py-2.5 rounded font-medium hover:bg-gray-800 transition-colors`.

This is the only place where the canvas inverts to a warm light background. Use it sparingly and at the end of a page.

### Cookie banner
- Fixed bottom strip, `rgba(0,0,0,0.95)` with backdrop blur, `border-top: 2px solid #fbbf24`.
- Slides in via `transform: translateY(100% to 0)` over 300ms.
- Accept button: `bg-yellow-400 text-black hover:bg-yellow-300 px-5 py-2 rounded font-medium`.

### Lightbox
- Overlay `rgba(0,0,0,0.9)`, fades in 300ms, content max 90% width and height.
- Close glyph `#f1f1f1` shifting to `#fbbf24` on hover.
- Prev/next: dark pill buttons (`rgba(0,0,0,0.5)` to `0.8` on hover, `#fbbf24` glyph on hover).
- Caption: dark pill at the bottom, `400px` wide x `80px` tall, title in yellow-400 (`text-2xl bold`), subtitle in `gray-200`. Hidden when the active gallery set has only one image (`.lightbox.single-image .lightbox-nav { display: none; }`).
- Gallery is multi-set; sets are registered in `js/main.js` (`photos`, `boardgameSetup`, `boardgameTiles`, `boardgameCardFronts`, `boardgameCardBacks`, `videogameCards`, `videogameTiles`).

### Devlog card (`videogame.html`)
```
bg: rgba(31,41,55,0.8); border: 1px solid rgba(251,191,36,0.25); rounded: 0.5rem
hover: border rgba(251,191,36,0.45); bg rgba(31,41,55,0.95)
title: font-semibold #fbbf24
body: #d1d5db, 0.95rem, line-height 1.5
```

### Devlog badge
```
inline-block, padding: 0.5rem 1rem, font-size: 0.9rem
font-weight: 600, letter-spacing: 0.05em
border: 2px solid #fbbf24; color: #fbbf24
background: rgba(251,191,36,0.08); border-radius: 0.375rem
```

### Footer
```
bg-black py-8; max-w-6xl mx-auto px-4 text-center
```
Two paragraphs in `text-sm text-gray-500` and `text-gray-400`. Inline links to internal pages (e.g. About) shift to yellow-400 on hover. The **References** link is the one footer exception: it sits at rest in `text-yellow-400 hover:text-yellow-300` so the bibliography is discoverable from every page (it is intentionally not in the main nav). Version tag in `text-xs text-gray-600 ml-2`.

### Bibliography list (`references.html`)
The references page reuses the editorial chapter spine (watercolor swatch + Italianno script title + sentence-headline + small italic lead) and renders citations as a `<ul class="space-y-5 text-gray-300 text-[15px] md:text-base leading-relaxed">`. Each `<li>` is one APA 7 citation; book and journal titles are wrapped in `<em>`; DOI/URL links use the standard inline link pattern with `break-words` so long DOIs wrap on mobile. Eight thematic chapters, each colored by a single watercolor swatch (red/blue/purple/green/black) drawn from the boardgame card backs in `img/design/bg-*.webp`. The page is reachable from the footer of every other page and from an inline link in `about.html`; it is intentionally absent from the main nav.

### Editorial chapter spine
The signature body-section pattern across all six visible pages and the presentation deck. Each chapter is introduced by a row consisting of:

1. A small watercolor **swatch** taken from one of the boardgame card backs in `img/design/bg-*.webp` (red / blue / purple / green / black). The swatch is `~2.5rem × 3.25rem` on the deck and `w-10 h-14` (Tailwind) on the site, with `object-cover` cropping.
2. An **Italianno chapter title** in `text-yellow-400` at `text-4xl` to `text-5xl` (`clamp(3.25rem, 6.5vw, 5.25rem)` on the deck).
3. A `border-top: 1px solid rgba(75, 85, 99, 0.4)` hairline above the row, inside a column at `pt-3` so the swatch and title hang from the line.

After the chapter row comes a sentence-case **h2** in Inter at `text-2xl` to `text-3xl`, then prose. On site pages each major section is one chapter; on the deck each slide has its own chapter row. Chapter colour selection is loose — pick the swatch whose mood fits the section (red for stakes, blue for reflection, purple for community, green for movement, black for foundation/ending).

**Trap to avoid:** a `<h2 class="sr-only">` as the first DOM child of a `space-y-*` container creates a phantom `margin-top: 3rem` on the first visible sibling because the sr-only element still occupies the "first child" slot in the sibling combinator. Use explicit `mt-12 md:mt-14` on subsequent siblings instead of `space-y-*` when an sr-only heading is present.

### Presentation deck (`presentation.html`)
A 15-slide self-contained conference deck. **Self-contained means literally:** the slide system, navigation, presenter mode, overview overlay, hint legend, QR card, and print-to-PDF support are all defined inside an inline `<style>` block and an inline IIFE `<script>` in the same HTML file. The site-wide `tailwind.css` and `styles.css` are linked but used only for the `.card-COLOR` classes and font faces.

Visual vocabulary:
- **Background** is `#111827` (gray-900), one shade deeper than the rest of the site.
- **Chapter spine** as documented above; `.chapter-title` clamps to `clamp(3.25rem, 6.5vw, 5.25rem)`.
- **Pull quotes** in italic `text-yellow-400` at `clamp(1.5rem, 2.4vw, 2.25rem)`, `max-width: 50rem`.
- **Body prose** in `gray-300` at `clamp(1rem, 1.4vw, 1.35rem)`, weight 300.
- **Italianno** is reserved for the cover (`text-7xl-ish`), the chapter-spine titles, the timeline `when` labels, and the closing "Thank you" mark — all clear above the legibility floor.

Behaviour:
- Keyboard: `← / →` navigate; `1`–`9` digits jump (multi-digit buffered ~700ms); `O` opens the slide overview; `S` toggles inline speaker notes (`?notes` URL flag opens with notes visible); `F` fullscreen; `P` print to PDF; `W` opens the presenter window; `Esc` closes overview / presenter window.
- **Presenter mode** is the same page loaded with `?presenter=1`. Renders chapter, h2, full speaker notes, an "Up next" panel, slide counter, and a session timer (`R` resets, `Esc` closes). Both windows sync via `BroadcastChannel('journeyways-deck')`.
- **Bottom hint legend** is hidden by default and reveals only when the cursor enters the bottom 64 px of the viewport. No reveal on keypress.
- **Speaker-note typography** uses an Inter uppercase yellow eyebrow for the h4 (the timing label) and 1rem body at line-height 1.6. **Don't use Italianno for note titles** — the script font is below the legibility floor at notes sizes.
- **Print** stylesheet uses `@page { size: 16in 9in; margin: 0 }` so any browser's "Print to PDF" produces a 16:9 deck.

Slide-specific helpers in the inline style:
- `.timeline.four` for the four-phase methodology grid on slide 12.
- `.card-front-row.four` for four card examples with their hand-authored prompts on slide 7.
- Specificity overrides on `.card-back .label.card-COLOR` so slide 6 pile labels can use the site-wide `.card-COLOR` classes.
- `.closing-mark` for the faded `og-card.webp` echo on slide 15.
- `.qr-card` for the QR code on slide 15. The SVG (`img/qr-journeyways.svg`) is generated white-on-`#111827` via `qrencode --foreground=ffffff --background=111827 -m 2 -s 8 -l M` so it sits flush against the slide background. Cache-busted via `?v=N` on the img src; bump if regenerated.

Discoverability:
- Linked from the About hero bar between References and UBC GRSJ.
- Listed in `sitemap.xml` at priority 0.5.
- `meta robots = "noindex, nofollow"` so the deck is linkable but not indexed by search engines while content iterates.

### Animations
- `fadeIn` (1s ease-in, opacity + translateY 20px to 0). Available as `.fade-in`.
- `zoomIn` (declared, used by lightbox transitions).
- Marquee fade keyframes (24s loop). All custom motion respects `prefers-reduced-motion`.
- Hover transitions on borders and colors are 200ms ease.

### Effects
- `text-shadow: 0 0 6px rgba(0,0,0,0.08)` available as `.text-shadow` for headings on busy backgrounds.

---

## 6. Imagery

### Style
- **Watercolor illustration** for the logo and the three home feature thumbnails (`no_fixed_roles.jpg`, `collaborative_storytelling.jpg`, `continuous_growth.jpg`). Soft edges, layered washes, warm-meets-cool palette echoing the logo.
- **Documentary photography** for research and playtest content (`edges_playtest_*`, `players_in_action`, `boardgame_components`, `boardgame_setup`). Natural light, candid, minimally edited.
- **Component renders** for the design page (`img/design/*.webp`): card fronts, card backs, and 900x900 wooden map tiles.

### File conventions
- WebP is the primary format for photos; JPG kept as fallback.
- Tile webps under `img/design/` should be **900x900 square**. If a new tile arrives at 700x700, re-encode from the source under `~/FileShare/jw/game materials/Map Tiles/` so it matches in the lightbox.
- Card webps are **700x545**. In the gallery they are shown at `w-72 h-56` (roughly the same aspect, ~1.286). In the lightbox they appear at native aspect.
- Thumbnails should match the source aspect or `object-cover` will crop and the click into the lightbox will feel jarring.

### OG and favicon
- Open Graph: `img/og-card.jpg` (and `.webp`) on every page. Pages that argue for a more specific preview (e.g. `design.html`) override with a tile illustration.
- Favicon: `img/favicon.png` at 16x16 and 32x32.

---

## 7. Voice and copy rules

- **No em-dashes anywhere.** Prose, HTML entities, code, comments, and commit messages. Use commas, semicolons, parentheses, colons, or "or" instead. This is a hard rule.
- Sentence case for headings (except the JOURNEYWAYS wordmark, which stays all-caps in nav references and meta).
- Page titles follow the pattern `JOURNEYWAYS | <Page>`.
- Footer attribution: "Master's research conducted by Adri M. at the UBC Institute for Gender, Race, Sexuality and Social Justice."
- Avoid commercial superlatives ("revolutionary", "best", "ultimate"). Prefer descriptive verbs: explore, unfold, uncover, reveal, become.
- **"Pick" not "draw"** when selecting a card or tile from a pile. "Draw" / "drawn" is reserved for actual illustrating in this game (sticky-note tiles, journal doodles, comic panels, hand-drawn artwork). Phrases like "drawn from a small canon" (= sourced from) are fine.

### Voice examples

Lines from the site (and the deck) that exemplify the voice. Use these as a calibration set when writing new copy.

> A game about becoming.
*— The whole tagline. Two short noun phrases, no punctuation flourishes, no hedge. The voice in eight syllables.*

> Identity is enacted, not declared. Forms do not give identity room to enact.
*— Slide 2, presentation deck. The methodological argument as two short sentences. Note the inversion structure (X, not Y) and the deliberate near-repeat of "enact / enacted." Sentence two is a five-word punch.*

> What if research happened around a table, not across one?
*— Slide 3 headline. The whole project as a question, with a preposition swap doing all the work. This is a model for headlines: change one small thing and let the change carry the meaning.*

> It is a game. We are just playing. Everything is safe. You can't lose.
*— Slide 3 pull quote. Four sentences, all declarative, all under six words. Reads like spoken instruction at a table. The voice when reassuring a player.*

> A mirror in a cave is not a mirror in a classroom.
*— Slide 7. Concrete, parallel, no abstraction. "Designed to elicit, not to provide" is the abstraction; this sentence carries it.*

> Doing nothing is also a way of expression.
*— Slide 8, on the booklet. Permission given in five words. Notice the gentle "also" — the line could read as a permission slip, but "also" makes it a fact about expression generally.*

> The more the players create new rules, the better the game goes.
*— Slide 13 closing line. Design philosophy compressed to fifteen words. Plain register. No design-jargon ("emergent," "generative") that would distance the reader.*

> Visibility, where there has been silence.
*— Closing-slide political horizon (since removed from the deck for pacing, kept in the project elsewhere). One noun, one preposition phrase — read it as a coda, not a thesis.*

**Patterns to notice.** Short sentences predominate. Inversions and near-rhymes do the rhetorical work; superlatives never do. Concrete imagery (a mirror in a cave, a table, doing nothing) carries every abstract claim. The voice is gentle rather than emphatic — periods, not exclamations. When in doubt, write less.

---

## 8. Tokens reference

A consolidated token table covering colour, type, spacing, radius, shadow, and motion. The CSS custom properties block at the end compiles the colour and type tokens for optional adoption. Spacing and motion tokens are documented but not centralized in CSS today; codify them on a future refactor.

### Spacing

Tailwind defaults plus a few clamp-based custom values used on the deck.

| Token | Value | Where it's used |
|---|---|---|
| `space-section` | `py-12` to `py-14` (3 to 3.5rem) | Major section vertical rhythm |
| `space-page-header` | `mb-14` (3.5rem) | Below page H1 / hero blocks |
| `space-longform` | `space-y-16` (4rem) | Between long-form sub-sections (e.g. design.html) |
| `space-card` | `p-6` to `p-7` (1.5 to 1.75rem) | Feature cards, devlog cards |
| `space-modal` | `p-6 md:p-7` | Modal interiors |
| `space-button` | `px-5 py-2` to `px-6 py-2.5` | Primary and secondary buttons |
| `space-deck-y` | `clamp(2.5rem, 6vh, 5rem)` | Vertical padding on presentation slides |
| `space-deck-x` | `clamp(1.5rem, 6vw, 5rem)` | Horizontal padding on presentation slides |
| `gap-grid` | `gap-8 md:gap-12` | Hero column gap |
| `gap-tight` | `gap-2 to gap-4` | Inline meta rows (icon + text) |

### Border radius

Default-low and consistent. There are no pill buttons anywhere on the site — that's deliberate.

| Token | Value | Used for |
|---|---|---|
| `radius-default` | `0.25rem` (`rounded`) | Cards, buttons, images, modals, dialog popups |
| `radius-soft` | `0.4rem` to `0.5rem` | Deck card backs, deck card fronts, deck instrument thumbs, QR card |
| `radius-pill` | `rounded-full` | Avatar / feature thumbnails only |
| `radius-large` | `0.5rem to 0.6rem` | Devlog cards, modals on the home dialog popups |

### Shadow

Routine site UI uses no shadows at rest — the dark surface and yellow accents do the lifting. Shadows are reserved for the presentation deck (where slides need to feel staged) and for elevated moments like the lightbox.

| Token | Value | Used for |
|---|---|---|
| `shadow-card` | none | Site cards at rest. Border + hover-color does the lift |
| `shadow-deck-card-back` | `0 8px 20px rgba(0,0,0,0.45)` | Deck card backs on slide 6 |
| `shadow-deck-card-front` | `0 6px 16px rgba(0,0,0,0.4)` | Deck card fronts on slide 7 |
| `shadow-deck-thumb` | `0 8px 20px rgba(0,0,0,0.4)` | Instrument thumbnails on slide 4 |
| `shadow-deck-photo` | `0 10px 24px rgba(0,0,0,0.4)` | Photo blocks (e.g. journaling on slide 8) |
| `shadow-deck-qr` | `0 6px 16px rgba(0,0,0,0.45)` | QR code on slide 15 |
| `shadow-popup-warning` | `0 12px 32px rgba(0,0,0,0.6)` | Pop-up blocked warning on the deck |

### Motion

All custom motion respects `prefers-reduced-motion: reduce` (the marquee collapses to a stacked flex list; transitions retain the end state without animating).

| Token | Duration | Easing | Used for |
|---|---|---|---|
| `motion-hover` | 200ms | ease | Border and color hover transitions |
| `motion-fade-in` | 1s | ease-in | `.fade-in` utility (opacity + translateY 20px to 0) |
| `motion-modal` | 300ms | ease | Cookie banner slide-in, lightbox overlay fade-in |
| `motion-deck-slide` | 220ms | ease | Slide opacity transitions in the presentation deck |
| `motion-deck-hint` | 400ms | ease | Bottom hint legend reveal/hide on cursor proximity |
| `motion-marquee` | 24s loop | linear | Home marquee fade keyframes (4 messages, paused on hover) |

### Quick CSS variable sketch (optional adoption)

If a future refactor wants tokens in one place, this is the colour + type spec compiled into CSS custom properties. Not currently in `styles.css`; included for reference. Spacing, radius, shadow, and motion tokens above could be added on the same pass.

```css
:root {
  /* Brand */
  --color-brand:        #fbbf24;  /* yellow-400 */
  --color-brand-hover:  #fcd34d;  /* yellow-300 */

  /* Surface */
  --color-bg:           #1f2937;  /* gray-800, site default */
  --color-bg-deck:      #111827;  /* gray-900, presentation deck */
  --color-bg-deep:      #000000;
  --color-surface:      rgba(55,65,81,0.6);  /* gray-700/60 */
  --color-hairline:     rgba(75,85,99,0.4);  /* gray-700/40, dividers */
  --color-border:       #4b5563;             /* gray-600 */
  --color-border-hover: rgba(251,191,36,0.35);

  /* Text */
  --color-text:         #ffffff;
  --color-text-muted:   #d1d5db;  /* gray-300 */
  --color-text-meta:    #6b7280;  /* gray-500 */

  /* Card content tokens (boardgame) */
  --card-black:  #6b7280;
  --card-blue:   #3b82f6;
  --card-green:  #10b981;
  --card-purple: #8b5cf6;
  --card-red:    #ef4444;
  --tile-wood:   #c9a87c;

  /* Type */
  --font-sans:   'Inter', sans-serif;
  --font-script: 'Italianno', cursive;

  /* Italianno legibility floor — only use for elements >= this size */
  --italianno-min: 2.5rem;
}
```

---

## 9. Companion materials

This brand spec applies to two extension surfaces beyond the website: **print derivatives** (posters, handouts, conference materials, the existing rulebook and player booklet PDFs) and the **videogame UI** (the in-development digital version of JOURNEYWAYS). The rules below carry the system into those contexts.

### Print derivatives

**Colour conversion.** All site colours are sRGB hex. For print, convert to CMYK at the press's preferred profile (FOGRA39 / GRACoL 2006 are typical). Approximate CMYK values for the brand:

| Site role | Hex (sRGB) | Approximate CMYK | Pantone (close match) |
|---|---|---|---|
| Brand accent (yellow-400) | `#fbbf24` | C0 M27 Y86 K0 | PMS 1235 C |
| Page background (site) | `#1f2937` | C82 M70 Y50 K56 | PMS 7546 C |
| Page background (deck) | `#111827` | C90 M78 Y52 K70 | PMS 7547 C |
| Card red | `#ef4444` | C0 M83 Y73 K0 | PMS 178 C |
| Card blue | `#3b82f6` | C72 M48 Y0 K0 | PMS 2925 C |
| Card green | `#10b981` | C75 M0 Y65 K0 | PMS 7724 C |
| Card purple | `#8b5cf6` | C55 M68 Y0 K0 | PMS 2665 C |
| Tile wood | `#c9a87c` | C20 M30 Y55 K10 | PMS 7501 C |

The yellow loses some pop in CMYK. If a piece *needs* the screen brightness (gallery wall, large-format poster), spec a fluorescent or Pantone yellow rather than process CMYK.

**Resolution and the logo.** The illustrated mark master is `img/og-card.jpg` at roughly 600x600 px. That's adequate for small print at 300 dpi (business cards, postcards up to ~5x5 cm). It is *not* adequate for posters or any reproduction over ~10 cm square. For larger pieces, use the **typographic wordmark** (Italianno, vector — see fonts) instead of upscaling the watercolor. If a poster requires the illustrated mark at large size, commission a high-resolution rebuild from the original watercolor source rather than scaling the JPG.

**Bleed and quiet space.** 3 mm bleed standard on all printed pieces. Quiet space around the logo: at minimum half the logo's height on every side (the same rule as on screen). For the wordmark on its own, half the cap-height of "J" works as the quiet space rule.

**Fonts and licensing.** Inter (SIL Open Font License) and Italianno (SIL OFL) are both free for commercial print use, including embedding in supplied PDFs and outlining for press. No license tracking required. Always **embed or outline** fonts when supplying PDF for press; never assume the printer has the families installed.

**File formats for press.**
- PDF/X-1a for offset litho.
- PDF/X-4 for digital and inkjet (preserves transparency and CMYK + ICC).
- sRGB PDF acceptable for in-house desktop colour printing.
- Always supply a 3 mm bleed and visible crop marks unless the printer specifies otherwise.

**Existing print artifacts.** `download/JOURNEYWAYS Game Rules 1.0.pdf` and `download/JOURNEYWAYS Player Booklet 1.0.pdf` are the canonical printed pieces today (Ghostscript-optimized via `/ebook` setting). Preserve their cover artwork direction when designing companions.

### Videogame UI (`play.journeyways.ca`)

The videogame is the digital version of JOURNEYWAYS. **It is the same game in a different access door** (per the slide 10 framing on the deck), and the brand system carries over directly. Where the videogame UI deviates from the site, it follows the deck.

**Surface and colour.**
- Default background: `#111827` (gray-900), same as the presentation deck. The deeper background lets watercolor cards, tiles, and the yellow accent sit cleanly during long sessions.
- Hairline dividers: `rgba(75,85,99,0.4)`.
- Card backs and content tokens (`#ef4444` etc.): use the existing `.card-COLOR` palette unmodified. These are the physical-component canon; players who play both physical and digital should recognize the colours immediately.
- No bright daylight modes, no "high-contrast" auto-themes that recolor the brand. If accessibility requires a higher-contrast variant, lift the text colours, not the brand chrome.

**Typography.**
- Inter for all UI text: buttons, modals, journal entries, prompts, system messages.
- Italianno reserved for the same display elements as on the deck and site: the wordmark, large screen titles (`>= ~2.5rem`), and any "chapter" rows in long-form content. **Never use Italianno for buttons, labels, or any inline UI text.**
- The same Italianno legibility floor (§3) applies. If anywhere in the videogame a heading has to be set below ~2.5rem, drop to Inter and treat it as an uppercase yellow eyebrow (`0.85rem`, `letter-spacing 0.18em`, `text-transform uppercase`, `color #facc15`, `font-weight 500`).

**Components.**
- Buttons: `bg-yellow-400 text-black hover:bg-yellow-300 px-5 py-2 rounded font-medium` for primary; ghost / secondary variants follow the same radius and padding with a yellow-400 border on hover.
- Modals: same dialog pattern as the site (`bg-gray-800 text-white rounded p-6 md:p-7 border border-gray-600 backdrop:bg-black/70`).
- Form controls (checkboxes and toggles): the unchecked state needs an explicit border so the control is visible against the gray-900 base; relying on `accent-color` alone is not enough. Default neutral state uses a 2 px `#ffffff` border on a dark fill (`rgba(0, 0, 0, 0.25)` at rest), filling to solid `#ffffff` when checked. Use `.checkbox-success` / `.toggle-success` (`#10b981`) and `.checkbox-error` / `.toggle-error` (`#ef4444`) only when the control's checked state is semantically positive or negative; feature flags, preferences, and consent boxes stay white. The brand yellow is reserved for chrome (links, primary buttons, focus rings), not for input controls; pairing a yellow control with a yellow button on the same form muddies the visual hierarchy.
- Page titles in Italianno (videogame divergence from the marketing site): on narrative or atmospheric pages (dashboard, profile, auth flows, error and maintenance, legal pages), the page-level H1 may be set in Italianno yellow-400, sized comfortably above the legibility floor at `clamp(2.75rem, 5vw, 4rem)`. The marketing site's page H1 stays in Inter (`text-3xl md:text-4xl`); the videogame's atmospheric headers earn the script. Functional or technical pages (status, diagnostic, room view where the H1 is user-supplied content) keep the H1 in Inter. H2 and below stay in Inter site-wide and in the videogame.
- Card pulls and tile placements: animations should be skeuomorphic (a tile slides into place, a card flips), never theatrical (no particle effects, no exaggerated bounces). The restraint is part of the design.
- Journal interface: the booklet is the focal artifact. UI chrome should fade out; the page itself should feel like paper. A low-saturation cream background for the journaling surface inside an otherwise dark UI is acceptable, even though it diverges from the gray-900 default.
- Pile labels in-game must use the `.card-COLOR` classes unmodified, even if it requires specificity overrides against UI defaults (this came up on slide 6 of the deck and the same pattern applies).

**Hard constraints carried from the project ethics.**
- **No camera support anywhere in the UI.** Privacy-first; no avatar capture, no video calls between players.
- **No generative content in prompts, illustrations, or UI copy.** Every prompt is hand-authored and every illustration is hand-painted; the UI must inherit that constraint.
- **No auto-translation of player content.** Player journals stay exactly as written.
- **Audio-only documentation** for any session recording feature; no video recording.
- **Data sovereignty.** Journals hosted on Canadian servers; all storage decisions surface through the privacy policy and terms of use linked from the site.

**What's already built.** `play.journeyways.ca` runs Express 5 / EJS / Socket.io / Helmet / argon2 / MySQL sessions on PM2 (per the top-level `CLAUDE.md`). Its existing views and stylesheets are the de facto reference implementation of the brand system on the videogame side; new UI work should match their patterns rather than reinventing.

---

## 10. Files to know

| File | What it holds |
|---|---|
| `css/styles.css` | `@font-face`, card colors, hero bg, marquee, cookie banner, lightbox, devlog cards |
| `css/tailwind.css` | Compiled utilities (rebuild via `cd tools && npm run build`) |
| `tools/tailwind.config.js` | Currently empty `theme.extend`; the spec above is implicit, not declared |
| `js/main.js` | CTA injection (the "Ready to Begin?" section), lightbox sets, mobile menu, cookie banner, contact form |
| `img/og-card.jpg` | Master logo artwork |
| `img/favicon.png` | Favicon (cropped logo) |
| `img/design/` | Card and tile illustrations used on `design.html` and in lightbox sets |
| `fonts/` | Inter (5 weights) and Italianno (1 weight), woff2, latin + latin-ext |
| `references.html` | Bibliography page; eight thematic chapters of APA 7 citations. Footer-linked from every page; absent from main nav |
| `presentation.html` | Self-contained 15-slide conference deck. Inline `<style>` and `<script>` define the slide system, presenter mode, overview overlay, and hint legend. Linked from the About hero bar; `noindex, nofollow` |
| `img/qr-journeyways.svg` | QR code on the closing slide. Regenerate via `qrencode -t SVG -m 2 -s 8 -l M --foreground=ffffff --background=111827 https://www.journeyways.ca/`. Bump `?v=N` on the img src if regenerated |
