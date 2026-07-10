<?php
// Tiles component page body. Chrome (head + nav + footer) comes from the partials.
// The tile grid itself is rendered client-side by /js/components-tiles.js from the
// same /api/tiles the play app uses; this page only provides the frame and the
// page-specific styles the shared /css/game-components.css depends on.
$P = 'pages.components-tiles';
?>
<link rel="stylesheet" href="/css/game-components.css?v=2">
<style>
  /* The tiles page renders only the tile grid. Tile FACE styles come from the
     shared /css/game-components.css (linked in the head), the same single
     source the play app uses; only this page's chrome (background, grid,
     caption) is here. The card-gallery chrome lives on components-cards.html. */
  .jw-wrap { background: #111827; }
  .jw-hint { color: #9ca3af; }

  /* Tiles: square (post-it sized). The name is not printed on the tile, so it
     shows as a caption; each illustrated tile credits the artist. The blank
     tile has no art, repeats, and invites players to draw their own place. */
  .jw-tiles-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(170px, 1fr)); gap: 1.6rem; }
  .jw-tile-fig { margin: 0; display: flex; flex-direction: column; gap: 0.55rem; }
  .jw-tile-cap { text-align: center; }
  .jw-tile-name { display: block; font-family: 'Italianno', cursive; font-size: clamp(1.4rem, 3vw, 1.7rem); line-height: 1; color: #fff; }
  .jw-tile-credit { display: block; font-family: 'Inter', sans-serif; font-size: 0.62rem; letter-spacing: 0.07em; text-transform: uppercase; color: rgba(255,255,255,0.45); margin-top: 0.2rem; }
  @media (prefers-reduced-motion: reduce) { .jw-tile { transition: none; } }
</style>

    <main class="jw-wrap min-h-screen" style="padding-top: 3.5rem;">
        <div class="max-w-6xl mx-auto px-4 pt-5 pb-12">
            <a href="<?= esc(jw_page_url('/components.html', $JW_LANG)) ?>" class="inline-flex items-center gap-2 text-sm text-yellow-400 hover:text-yellow-300 transition-colors mb-6"><?= t("$P.back") ?></a>
            <header class="text-center mb-12">
                <h1 class="script-font text-7xl md:text-8xl text-yellow-400 leading-[0.95] mb-3"><?= te("$P.title") ?></h1>
                <p class="jw-hint text-sm max-w-2xl mx-auto" id="jw-tiles-sub"><?= te("$P.subtitle") ?></p>
            </header>

            <section id="tiles-section" aria-labelledby="tiles-heading">
                <div id="jw-tiles">
                    <p class="jw-hint text-center py-12"><?= te("$P.loading") ?></p>
                </div>
            </section>
        </div>
    </main>

    <script src="/js/game-components.js?v=3" defer></script>
    <script src="/js/components-tiles.js?v=6" defer></script>
