# JOURNEYWAYS brand spec

A reference for the visual identity of `www.journeyways.ca`. Captures what the site is doing today (v1.1.2). Use this when extending the site, building companion materials, or briefing collaborators.

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
- The wordmark is the word "JOURNEYWAYS" set in **Italianno** (script), color `text-yellow-400` (`#fbbf24`), bold.
- In the fixed nav it appears as `Journeyways` at `text-2xl md:text-3xl`.
- On the home page it appears as a hero `Journeyways` at `text-7xl md:text-8xl`, leading-none.
- CSS hook: `.script-font` (defined in `css/styles.css`).

### Logo (illustrated mark)
- File: `img/og-card.jpg` (and `og-card.webp`); square master at roughly 600x600.
- Description: a watercolor of two profile silhouettes facing each other. The left profile is rendered in warm tones (red, orange, gold), the right in cool tones (blue, teal, purple). Between them, where the silhouettes meet, the negative space frames a landscape: mountains, water, and pines in dusty pinks fading to deep blue. The composition signals duality, encounter, and inner landscape.
- Favicon: `img/favicon.png` (a tighter crop of the same artwork).
- Background-only variant: `img/logo_bg_only.jpg` (still used as `.hero-bg` on `boardgame.html`).
- Do not crop tightly past the chin line; the meeting of profiles is the load-bearing element.

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
| Page background | `gray-800` | `#1f2937` | `<body>` default |
| Deep surface | `black` | `#000000` | Footer, primary buttons, nav at 50% opacity |
| Card / panel surface | `gray-700/60` | `rgba(55,65,81,0.6)` | Feature cards, modals (interior); also `gray-700/40` for lighter panels |
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
- **Inter** (sans-serif). Self-hosted woff2 in `fonts/`, weights 300, 400, 500, 600, 700, latin and latin-ext subsets. Body text and all headings except the wordmark.
- **Italianno** (script). Self-hosted woff2, weight 400 only. Reserved for the wordmark and rare display flourishes via `.script-font`.

Both are loaded with `font-display: swap` and `@font-face` declarations at the top of `css/styles.css`. No third-party font origins.

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
Two paragraphs in `text-sm text-gray-500` and `text-gray-400`. Inline links shift to yellow-400 on hover. Version tag in `text-xs text-gray-600 ml-2`.

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

---

## 8. Quick CSS variable sketch (optional adoption)

If a future refactor wants tokens in one place, this is the spec compiled into CSS custom properties. Not currently in `styles.css`; included for reference.

```css
:root {
  /* Brand */
  --color-brand:        #fbbf24;  /* yellow-400 */
  --color-brand-hover:  #fcd34d;  /* yellow-300 */

  /* Surface */
  --color-bg:           #1f2937;  /* gray-800 */
  --color-bg-deep:      #000000;
  --color-surface:      rgba(55,65,81,0.6);  /* gray-700/60 */
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
}
```

---

## 9. Files to know

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
