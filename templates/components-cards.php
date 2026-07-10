<?php
// Cards component page body. Chrome comes from partials/head + footer.
// Page-specific CSS (the shared card renderer + this page's deck chrome) and the
// gallery scripts are injected here because head/footer are generic. The gallery
// itself is built at runtime by js/components-cards.js (no static card markup).
$P = 'pages.components-cards';
?>
<link rel="stylesheet" href="/css/game-components.css?v=2">
<style>
  /* Local replica of the play-side card gallery. Cards render in the printed
     component style (poker 5:7, warm paper, scaled art, script title); decks
     start face down and deal out with a per-deck effect. Self-contained so it
     does not depend on the site's Tailwind build. */
  .jw-wrap { background: #111827; }
  .jw-hint { color: #9ca3af; }
  /* The deck row stays pinned below the nav while the dealt cards scroll, so
     you can switch decks without scrolling back up. When pinned (.is-stuck,
     toggled by an IntersectionObserver) the piles shrink with an animation,
     and grow back when you scroll to the top. */
  .jw-decks-sentinel { height: 1px; }
  .jw-decks-row { display: flex; flex-wrap: wrap; gap: clamp(1rem, 4vw, 3rem); justify-content: center; position: sticky; top: 2.9rem; z-index: 30; background: #111827; padding: 1.1rem 0 1.3rem; box-shadow: 0 10px 16px -10px rgba(0,0,0,0.7); transition: padding 0.28s ease, gap 0.28s ease; }
  .jw-decks-row.is-stuck { padding: 0.45rem 0 0.55rem; gap: clamp(0.6rem, 3vw, 1.6rem); }
  .jw-decks-row.is-stuck .jw-pile { width: clamp(52px, 12vw, 82px); }
  .jw-decks-row.is-stuck .jw-deck-col { gap: 0.3rem; }
  .jw-decks-row.is-stuck .jw-pile-label { font-size: 0.72rem; }
  @media (max-width: 640px) { .jw-decks-row.is-stuck .jw-pile-label { display: none; } }
  .jw-deck-col { display: flex; flex-direction: column; align-items: center; gap: 0.85rem; transition: gap 0.28s ease; }
  .jw-pile {
    position: relative; width: clamp(120px, 16vw, 150px); aspect-ratio: 5 / 7;
    border-radius: 0.6rem; cursor: pointer; padding: 0; border: 1px solid rgba(0,0,0,0.35);
    background-image: var(--back); background-size: cover; background-position: center;
    box-shadow: 1px 1px 0 #e7e2d6, 3px 3px 0 #dcd7c9, 5px 5px 0 #d1ccbd, 7px 7px 0 #c6c1b1, 9px 11px 22px rgba(0,0,0,0.5);
    transition: transform 0.25s ease, box-shadow 0.25s ease, width 0.28s ease;
  }
  .jw-pile:hover { transform: translateY(-5px) rotate(-1deg); }
  .jw-pile:focus-visible { outline: 3px solid rgba(251,191,36,0.7); outline-offset: 3px; }
  .jw-pile.is-active { box-shadow: 0 8px 18px rgba(0,0,0,0.5); transform: translateY(-2px); }
  .jw-pile.is-active::after { content: ''; position: absolute; inset: 0; border-radius: 0.6rem; box-shadow: inset 0 0 0 2px var(--suit, #fbbf24); }
  .jw-pile-count {
    position: absolute; right: -0.4rem; top: -0.4rem; min-width: 1.5rem; height: 1.5rem;
    display: inline-flex; align-items: center; justify-content: center; padding: 0 0.35rem;
    border-radius: 9999px; background: var(--suit, #6b7280); color: #fff;
    font-family: 'Inter', sans-serif; font-size: 0.7rem; font-weight: 700;
    box-shadow: 0 2px 6px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.3);
  }
  .jw-pile-label { font-family: 'Inter', sans-serif; font-size: 0.95rem; font-weight: 600; color: #fff; }
  .jw-panel { display: none; margin-top: 2.5rem; }
  .jw-panel.is-open { display: block; }
  .jw-panel-head { display: flex; align-items: center; gap: 0.6rem; margin-bottom: 1.1rem; }
  .jw-deck-dot { width: 0.8rem; height: 0.8rem; border-radius: 9999px; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.25); }
  .jw-panel-name { font-family: 'Inter', sans-serif; font-weight: 700; color: #fff; font-size: 1.125rem; }
  .jw-panel-meta { color: rgba(255,255,255,0.4); font-family: 'Inter', sans-serif; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; }
  .jw-panel-close { margin-left: auto; background: transparent; border: 0; color: rgba(255,255,255,0.7); font-family: 'Inter', sans-serif; font-size: 0.85rem; cursor: pointer; padding: 0.3rem 0.7rem; border-radius: 0.4rem; }
  .jw-panel-close:hover { color: #fff; background: rgba(255,255,255,0.08); }
  .jw-cards-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 1.4rem; }
  /* Card FACE styles come from the shared /css/game-components.css (linked in
     the head), the same single source the play app uses. Only this page's
     chrome (deck piles, grid, reveal animation, lightbox zoom) is here. */
  .jw-panel.is-open .jw-card { animation: jw-deal 0.5s cubic-bezier(0.2,0.7,0.3,1) both; animation-delay: calc(var(--i, 0) * 0.035s); }
  @keyframes jw-deal { from { opacity: 0; transform: var(--from, translateY(24px)); } to { opacity: 1; transform: none; } }
  .jw-panel[data-effect="fan"]     .jw-card { --from: translateY(-60px) rotate(calc((var(--i) - var(--n) / 2) * 4deg)) scale(0.8); }
  .jw-panel[data-effect="cascade"] .jw-card { animation-delay: calc(var(--i, 0) * 0.06s); --from: translateY(-46px) scale(0.9); }
  .jw-panel[data-effect="spread"]  .jw-card { --from: scale(0.4) rotate(-6deg); }
  .jw-panel[data-effect="deal"]    .jw-card { --from: translate(-70px, -90px) rotate(-12deg) scale(0.78); }
  .jw-panel[data-effect="pop"]     .jw-card { animation-timing-function: cubic-bezier(0.3,1.5,0.5,1); --from: scale(0.15) rotate(10deg); }
  @media (prefers-reduced-motion: reduce) { .jw-pile, .jw-card { transition: none; } .jw-panel.is-open .jw-card { animation: none; } }

  /* The card renders inside the shared site lightbox (.lightbox-stage) at a
     larger real width (NOT zoom): the card scales its contents from its own
     width via container queries, and `zoom` throws off how those cqw units
     resolve in some browsers, so it is given a bigger width directly. */
  .lightbox-stage .jw-card { width: min(87vw, 437px, 57vh); cursor: default; }
  .lightbox-stage .jw-card:hover { transform: none; }
  .jw-section-head { text-align: center; margin-bottom: 2.5rem; }
</style>

    <main class="jw-wrap min-h-screen" style="padding-top: 3.5rem;">
        <div class="max-w-6xl mx-auto px-4 pt-5 pb-12">
            <a href="<?= esc(jw_page_url('/components.html', $JW_LANG)) ?>" class="inline-flex items-center gap-2 text-sm text-yellow-400 hover:text-yellow-300 transition-colors mb-6">&larr; <?= te("$P.back") ?></a>
            <header class="text-center mb-12">
                <h1 class="script-font text-7xl md:text-8xl text-yellow-400 leading-[0.95] mb-3"><?= te("$P.heading") ?></h1>
                <p class="jw-hint text-sm max-w-2xl mx-auto" id="jw-sub"><?= te("$P.sub") ?></p>
            </header>

            <section id="cards-section" aria-labelledby="cards-heading">
                <div id="jw-gallery">
                    <p class="jw-hint text-center py-12"><?= te("$P.loading") ?></p>
                </div>
            </section>
        </div>
    </main>

<script src="/js/game-components.js?v=3" defer></script>
<script src="/js/components-cards.js?v=9" defer></script>
