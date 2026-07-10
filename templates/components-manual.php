<?php
// Game Manual component page. Chrome comes from partials/head + footer.
// Page-specific CSS lives inline (these jw-* classes are not in the shared
// stylesheet); a <style> in body is valid HTML5 and keeps this page self-contained.
$P = 'pages.components-manual';
?>
    <style>
      .jw-wrap { background: #111827; }
      .jw-hint { color: #9ca3af; }
      .jw-dl { display: inline-flex; align-items: center; gap: 0.5rem; background: #facc15; color: #111827; font-weight: 600; font-size: 0.9rem; padding: 0.6rem 1.15rem; border-radius: 6px; transition: background-color 150ms ease; }
      .jw-dl:hover { background: #fde047; }
      .jw-dl-row { display: flex; flex-wrap: wrap; gap: 0.6rem; justify-content: center; }
      .jw-pages { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 1.5rem; }
      .jw-page { margin: 0; display: flex; flex-direction: column; gap: 0.55rem; }
      .jw-page img { width: 100%; height: auto; display: block; background: #fff; border: 1px solid rgba(255,255,255,0.08); border-radius: 4px; box-shadow: 0 6px 20px rgba(0,0,0,0.35); cursor: pointer; transition: transform 150ms ease, box-shadow 150ms ease; }
      .jw-page img:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.5); }
      .jw-page figcaption { text-align: center; font-size: 0.62rem; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255,255,255,0.45); }
      @media (prefers-reduced-motion: reduce) { .jw-page img { transition: none; } }
    </style>

    <main class="jw-wrap min-h-screen" style="padding-top: 3.5rem;">
        <div class="max-w-6xl mx-auto px-4 pt-5 pb-16">
            <a href="<?= esc(jw_page_url('/components.html', $JW_LANG)) ?>" class="inline-flex items-center gap-2 text-sm text-yellow-400 hover:text-yellow-300 transition-colors mb-6">&larr; <?= te("$P.back") ?></a>
            <header class="text-center mb-12">
                <h1 class="script-font text-7xl md:text-8xl text-yellow-400 leading-[0.95] mb-3"><?= te("$P.title") ?></h1>
                <p class="jw-hint text-sm max-w-2xl mx-auto mb-2"><?= te("$P.intro") ?></p>
                <p class="text-gray-500 text-xs mb-7"><?= te("$P.pages_hint") ?></p>
                <div class="jw-dl-row">
                    <a href="/download/JOURNEYWAYS Game Rules 1.0 EN.pdf?v=3" download class="jw-dl"><?= t("$P.download.en") ?></a>
                    <a href="/download/JOURNEYWAYS Game Rules 1.0 ES.pdf?v=3" download class="jw-dl"><?= t("$P.download.es") ?></a>
                    <a href="/download/JOURNEYWAYS Game Rules 1.0 FR.pdf?v=3" download class="jw-dl"><?= t("$P.download.fr") ?></a>
                </div>
                <p class="text-gray-500 text-xs mt-3"><?= te("$P.download.note") ?></p>
            </header>

            <section aria-labelledby="preview-heading">
                <h2 id="preview-heading" class="sr-only"><?= te("$P.preview_heading") ?></h2>
                <div class="jw-pages">
                    <figure class="jw-page"><img src="/img/manual/p01.webp?v=3" alt="<?= te("$P.pages.0.alt") ?>" loading="lazy" onclick="openLightboxFromSet('manual', 0)"><figcaption><?= te("$P.pages.0.caption") ?></figcaption></figure>
                    <figure class="jw-page"><img src="/img/manual/p04.webp?v=3" alt="<?= te("$P.pages.1.alt") ?>" loading="lazy" onclick="openLightboxFromSet('manual', 1)"><figcaption><?= te("$P.pages.1.caption") ?></figcaption></figure>
                    <figure class="jw-page"><img src="/img/manual/p05.webp?v=3" alt="<?= te("$P.pages.2.alt") ?>" loading="lazy" onclick="openLightboxFromSet('manual', 2)"><figcaption><?= te("$P.pages.2.caption") ?></figcaption></figure>
                    <figure class="jw-page"><img src="/img/manual/p08.webp?v=3" alt="<?= te("$P.pages.3.alt") ?>" loading="lazy" onclick="openLightboxFromSet('manual', 3)"><figcaption><?= te("$P.pages.3.caption") ?></figcaption></figure>
                    <figure class="jw-page"><img src="/img/manual/p09.webp?v=3" alt="<?= te("$P.pages.4.alt") ?>" loading="lazy" onclick="openLightboxFromSet('manual', 4)"><figcaption><?= te("$P.pages.4.caption") ?></figcaption></figure>
                    <figure class="jw-page"><img src="/img/manual/p13.webp?v=3" alt="<?= te("$P.pages.5.alt") ?>" loading="lazy" onclick="openLightboxFromSet('manual', 5)"><figcaption><?= te("$P.pages.5.caption") ?></figcaption></figure>
                </div>
            </section>
        </div>
    </main>
