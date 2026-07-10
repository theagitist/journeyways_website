<?php
// Components hub page body. Chrome comes from partials/head + footer. Translatable text via t().
// This page carries its own component-hub styles; head.php has no per-page style hook,
// so the block lives here (a <style> element in the body is valid and applies globally).
$P = 'pages.components';

// Structural (non-translatable) data paired with dict text by index:
// [English canonical path, inline background-image style]. Card strings live in the dict.
$cards = [
    ['/components-cards.html',   "background-image: url('/img/cards/backs/back-reflection-300.webp');"],
    ['/components-tiles.html',   "background-image: url('/img/tiles/mirror-lake-400.webp');"],
    ['/components-booklet.html', "background-image: url('/img/booklet/p01.webp?v=3');"],
    ['/components-manual.html',  "background-image: url('/img/rulebook_cover.webp');"],
];
?>
<style>
  /* Component hub: one card per component type, each linking to its own page. */
  .ct-wrap { background: #111827; }
  .ct-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.6rem; max-width: 56rem; margin: 0 auto; padding-top: 1rem; }
  .ct-card { display: flex; flex-direction: column; border-radius: 0.9rem; overflow: hidden; background: #0f172a; border: 1px solid rgba(255,255,255,0.08); text-decoration: none; color: inherit; box-shadow: 0 8px 24px rgba(0,0,0,0.4); transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease; }
  a.ct-card:hover { transform: translateY(-6px); border-color: rgba(251,191,36,0.55); box-shadow: 0 16px 36px rgba(0,0,0,0.55); }
  a.ct-card:focus-visible { outline: 3px solid rgba(251,191,36,0.7); outline-offset: 3px; }
  .ct-card-img { position: relative; aspect-ratio: 16 / 10; background-size: cover; background-position: center; background-color: #1f2937; }
  .ct-card-img::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to top, rgba(15,23,42,0.92), rgba(15,23,42,0.15)); }
  .ct-card-img--placeholder { display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #1f2937, #111827); }
  .ct-card-img--placeholder span { font-family: 'Italianno', cursive; font-size: 3rem; color: rgba(251,191,36,0.28); position: relative; z-index: 1; }
  .ct-card-body { padding: 1.1rem 1.35rem 1.4rem; flex: 1; display: flex; flex-direction: column; }
  .ct-card-title { font-family: 'Italianno', cursive; font-size: 2.6rem; line-height: 1; color: #fbbf24; margin-bottom: 0.35rem; }
  .ct-card-desc { color: #9ca3af; font-size: 0.85rem; line-height: 1.5; flex: 1; }
  .ct-card-go { margin-top: 1rem; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.04em; color: #fbbf24; }
  .ct-card--soon { opacity: 0.6; }
  .ct-badge { align-self: flex-start; margin-top: 1rem; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.1em; color: #9ca3af; border: 1px solid rgba(255,255,255,0.2); border-radius: 9999px; padding: 0.15rem 0.6rem; }
  @media (prefers-reduced-motion: reduce) { .ct-card { transition: none; } }
</style>

    <main class="ct-wrap min-h-screen">
        <!-- ===== Hero: matches the other top-level pages (eyebrow + h1 + subtitle) ===== -->
        <section class="pt-24 md:pt-28 pb-8 md:pb-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <div class="flex items-center justify-center gap-2 mb-6 text-xs uppercase tracking-[0.25em] text-yellow-400/80">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" aria-hidden="true">
                            <rect x="3" y="3" width="7" height="7" rx="1"/>
                            <rect x="14" y="3" width="7" height="7" rx="1"/>
                            <rect x="3" y="14" width="7" height="7" rx="1"/>
                            <rect x="14" y="14" width="7" height="7" rx="1"/>
                        </svg>
                        <span><?= te("$P.hero.eyebrow") ?></span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white tracking-tight leading-[1.05] mb-3 md:mb-4"><?= te("$P.hero.title") ?></h1>
                    <p class="text-base md:text-lg italic font-light text-gray-300 mb-8 md:mb-10 max-w-prose mx-auto"><?= te("$P.hero.subtitle") ?></p>
                    <p class="text-base md:text-lg text-gray-400 leading-relaxed max-w-prose mx-auto"><?= te("$P.hero.lead") ?></p>
                </div>
            </div>
        </section>

        <section class="pb-16 md:pb-24">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="ct-grid">
<?php foreach ($cards as $i => [$href, $bg]): $c = "$P.cards.$i"; ?>
                <a href="<?= esc(jw_page_url($href, $JW_LANG)) ?>" class="ct-card" aria-label="<?= te("$c.aria") ?>">
                    <div class="ct-card-img" style="<?= esc($bg) ?>"></div>
                    <div class="ct-card-body">
                        <h2 class="ct-card-title"><?= te("$c.title") ?></h2>
                        <p class="ct-card-desc"><?= te("$c.desc") ?></p>
                        <span class="ct-card-go"><?= te("$c.go") ?> &rarr;</span>
                    </div>
                </a>
<?php endforeach; ?>
            </div>
            </div>
        </section>
    </main>
