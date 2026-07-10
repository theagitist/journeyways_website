<?php
// Player Booklet component page body. Chrome (head + nav + footer) comes from
// partials. Translatable text via t()/te() under pages.components-booklet.
$P = 'pages.components-booklet';

// Structural (non-translatable): preview image basename per row, paired with the
// dict pages[] entry (alt + caption) by index. Lightbox set is 'booklet'.
$previews = ['p01', 'p02', 'p03', 'p06', 'p15', 'p16'];
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
            <a href="<?= esc(jw_page_url('/components.html', $JW_LANG)) ?>" class="inline-flex items-center gap-2 text-sm text-yellow-400 hover:text-yellow-300 transition-colors mb-6"><?= te("$P.back") ?></a>
            <header class="text-center mb-12">
                <h1 class="script-font text-7xl md:text-8xl text-yellow-400 leading-[0.95] mb-3"><?= te("$P.title") ?></h1>
                <p class="jw-hint text-sm max-w-2xl mx-auto mb-2"><?= te("$P.lede") ?></p>
                <p class="text-gray-500 text-xs mb-7"><?= te("$P.count") ?></p>
                <div class="jw-dl-row">
                    <a href="/download/JOURNEYWAYS Player Booklet 1.0 EN.pdf?v=3" download class="jw-dl"><?= te("$P.dl.en") ?></a>
                    <a href="/download/JOURNEYWAYS Player Booklet 1.0 ES.pdf?v=3" download class="jw-dl"><?= te("$P.dl.es") ?></a>
                    <a href="/download/JOURNEYWAYS Player Booklet 1.0 FR.pdf?v=3" download class="jw-dl"><?= te("$P.dl.fr") ?></a>
                </div>
                <p class="text-gray-500 text-xs mt-3"><?= te("$P.dl.note") ?></p>
            </header>

            <section aria-labelledby="preview-heading">
                <h2 id="preview-heading" class="sr-only"><?= te("$P.preview_heading") ?></h2>
                <div class="jw-pages">
<?php foreach ($previews as $i => $img): $c = "$P.pages.$i"; ?>
                    <figure class="jw-page"><img src="/img/booklet/<?= esc($img) ?>.webp?v=3" alt="<?= te("$c.alt") ?>" loading="lazy" onclick="openLightboxFromSet('booklet', <?= $i ?>)"><figcaption><?= te("$c.caption") ?></figcaption></figure>
<?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>
