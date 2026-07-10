<?php
// Home page body. Chrome comes from partials/head + footer. Translatable text via t().
$P = 'pages.index';

// Structural (non-translatable) data paired with dict text by index.
$icons = [
    // No Fixed Roles (compass)
    '<circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>',
    // Collaborative (users)
    '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
    // Continuous Growth (sprout)
    '<path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/>',
];
$modalIds = ['modal-no-fixed-roles', 'modal-collaborative', 'modal-continuous-growth'];
$modalBg  = ['bg-red', 'bg-purple', 'bg-green'];
// [href, dict-suffix] for each modal's two "read further" links.
$modalLinks = [
    [['/design.html#identity', 0], ['/about.html', 1]],
    [['/design.html#combination', 0], ['/boardgame.html', 1]],
    [['/design.html#expression', 0], ['/about.html', 1]],
];
$arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 transition-transform group-hover:translate-x-0.5" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>';
?>
<main class="home">

    <!-- Hero -->
    <section class="relative pt-24 md:pt-32 pb-12 md:pb-16 md:min-h-[60vh] flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-center">
                <div class="col-span-12 md:col-span-7">
                    <div class="flex items-center gap-2 mb-6 text-xs uppercase tracking-[0.25em] text-yellow-400/80">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" aria-hidden="true">
                            <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/>
                            <path d="M22 10v6"/>
                            <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/>
                        </svg>
                        <span><?= te("$P.hero.eyebrow") ?></span>
                    </div>
                    <h1 class="main-title script-font font-bold text-yellow-400 text-7xl md:text-8xl leading-[0.95] tracking-tight mb-3 md:mb-4">Journeyways</h1>
                    <p class="text-base md:text-lg italic font-light text-gray-300 mb-8 md:mb-10 max-w-prose"><?= te("$P.hero.tagline") ?></p>
                    <p class="text-lg md:text-xl text-gray-200 leading-relaxed mb-3 max-w-prose"><?= t("$P.hero.lead") ?></p>
                    <p class="text-base md:text-lg text-gray-400 leading-relaxed mb-10 max-w-prose"><?= te("$P.hero.body") ?></p>
                    <a href="<?= esc(jw_page_url('/design.html', $JW_LANG)) ?>" class="inline-flex items-center gap-2 text-yellow-400 hover:text-yellow-300 underline underline-offset-[6px] decoration-1 transition-colors text-sm uppercase tracking-[0.2em]">
                        <span><?= te("$P.hero.design_link") ?></span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    </a>
                </div>
                <div class="col-span-12 md:col-span-5">
                    <figure class="hero-mask m-0">
                        <img src="/img/og-card.webp" alt="<?= te("$P.hero.image_alt") ?>" class="w-full h-auto block">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- Principles / feature cards -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 mb-10 md:mb-14">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.principles.stamp") ?></span>
                </header>
            </div>
            <h2 class="sr-only"><?= te("$P.principles.sr_heading") ?></h2>
            <div class="grid md:grid-cols-3 gap-px bg-gray-700/40 border border-gray-700/40">
<?php foreach ($icons as $i => $icon): $c = "$P.principles.cards.$i"; ?>
                <button type="button" data-open-modal="<?= esc($modalIds[$i]) ?>" aria-haspopup="dialog" class="feature-card group relative bg-gray-800 focus:outline-none focus:bg-gray-700/30 transition-colors p-10 md:p-12 text-left flex flex-col min-h-[260px] md:min-h-[300px]">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-gray-500 group-hover:text-yellow-400 transition-colors mb-10" aria-hidden="true"><?= $icon ?></svg>
                    <p class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$c.eyebrow") ?></p>
                    <h3 class="text-xl md:text-2xl font-medium text-white mb-5 tracking-tight leading-[1.15]"><?= te("$c.title") ?></h3>
                    <p class="text-sm text-gray-400 leading-[1.75] flex-1"><?= te("$c.body") ?></p>
                    <footer class="flex items-center gap-3 mt-12 pt-5 border-t border-gray-700/40 text-[10px] uppercase tracking-[0.3em] text-gray-500 group-hover:text-yellow-400 transition-colors">
                        <span><?= te("$P.principles.read") ?></span>
                        <span class="flex-1 h-px bg-current opacity-25"></span>
                        <?= $arrow ?>
                    </footer>
                </button>
<?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Feature modals -->
<?php foreach ($modalIds as $i => $id): $c = "$P.modals.$i"; ?>
    <dialog id="<?= esc($id) ?>" class="feature-modal bg-gray-800 text-white p-0 max-w-xl w-full border border-gray-700/60 backdrop:bg-black/80" aria-labelledby="<?= esc($id) ?>-title">
        <div class="p-8 md:p-10">
            <header class="flex items-start justify-between mb-10">
                <div class="w-12 h-16 md:w-14 md:h-20 overflow-hidden opacity-90 shrink-0">
                    <img src="/img/design/<?= esc($modalBg[$i]) ?>.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                </div>
                <button type="button" data-close-modal aria-label="<?= te("$P.modals.close") ?>" class="text-gray-500 hover:text-yellow-400 transition-colors -mt-1 -mr-1 p-1">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </header>
            <p class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$c.eyebrow") ?></p>
            <h3 id="<?= esc($id) ?>-title" class="text-2xl md:text-3xl font-medium text-white mb-6 tracking-tight leading-[1.15]"><?= te("$c.title") ?></h3>
            <p class="text-gray-300 text-base leading-[1.75] mb-5"><?= te("$c.body") ?></p>
            <p class="text-base md:text-lg italic font-light text-gray-100 leading-[1.55] mb-8"><?= te("$c.quote") ?></p>
            <footer class="pt-6 border-t border-gray-700/40">
                <p class="text-[10px] uppercase tracking-[0.3em] text-gray-500 mb-4"><?= te("$P.modals.read_further") ?></p>
                <div class="flex flex-col gap-3 text-sm">
<?php foreach ($modalLinks[$i] as [$href, $li]): ?>
                    <a href="<?= esc(jw_page_url(strtok($href, '#'), $JW_LANG) . (strpos($href, '#') !== false ? substr($href, strpos($href, '#')) : '')) ?>" class="inline-flex items-center gap-2 text-yellow-400 hover:text-yellow-300 transition-colors group">
                        <span><?= te("$c.links.$li") ?></span>
                        <?= $arrow ?>
                    </a>
<?php endforeach; ?>
                </div>
            </footer>
        </div>
    </dialog>
<?php endforeach; ?>

    <!-- Gameplay -->
    <section class="pt-8 md:pt-12 pb-4 md:pb-6 border-t border-gray-700/40">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <aside class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-blue.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.gameplay.stamp") ?></span>
                </aside>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 class="sr-only"><?= te("$P.gameplay.sr_heading") ?></h2>
                    <article>
                        <h3 class="text-xl md:text-2xl font-medium mb-5 tracking-tight leading-[1.15]"><?= te("$P.gameplay.a_title") ?></h3>
                        <p class="text-gray-300 text-base md:text-lg leading-[1.75]"><?= te("$P.gameplay.a_body") ?></p>
                    </article>
                    <article class="mt-12 md:mt-14">
                        <h3 class="text-xl md:text-2xl font-medium mb-5 tracking-tight leading-[1.15]"><?= te("$P.gameplay.b_title") ?></h3>
                        <p class="text-gray-300 text-base md:text-lg leading-[1.75]"><?= te("$P.gameplay.b_body") ?></p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Components plate -->
    <section class="pt-4 md:pt-6 pb-2 md:pb-4">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <figure class="m-0">
                <img src="/img/boardgame_components.webp" alt="<?= te("$P.components.image_alt") ?>" class="w-full h-auto block lightbox-trigger" loading="lazy" onclick="openLightboxFromSet('homeComponents', 0)">
                <figcaption class="mt-5 flex items-baseline gap-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">
                    <span class="shrink-0"><?= te("$P.components.caption") ?></span>
                    <span class="h-px flex-1 bg-gray-700/60"></span>
                    <span class="shrink-0 text-gray-500"><?= te("$P.components.enlarge") ?></span>
                </figcaption>
            </figure>
        </div>
    </section>

    <!-- Recent -->
    <aside role="region" aria-label="<?= te("$P.recent.aria") ?>" class="pt-8 md:pt-12 pb-4 md:pb-6 border-t border-gray-700/40">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-green.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.recent.stamp") ?></span>
                </header>
                <ul class="col-span-12 md:col-span-8 md:col-start-5 divide-y divide-gray-700/40 -mt-2 md:mt-0">
<?php foreach (jw_get("$P.recent.items") as $item): ?>
                    <li class="py-5 flex flex-col md:flex-row md:items-baseline md:gap-6">
                        <span class="text-sm tabular-nums text-gray-300 uppercase tracking-[0.15em] md:w-32 shrink-0 mb-1 md:mb-0"><?= esc($item['date']) ?></span>
                        <p class="text-gray-200 leading-[1.7] text-base"><?= $item['html'] ?></p>
                    </li>
<?php endforeach; ?>
                </ul>
            </div>
        </div>
    </aside>

    <div id="cta-container"></div>

</main>

<script>
    // Feature-card modals: open via [data-open-modal], close via [data-close-modal] or backdrop click.
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-open-modal]').forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                var dlg = document.getElementById(trigger.dataset.openModal);
                if (dlg && typeof dlg.showModal === 'function') dlg.showModal();
            });
        });
        document.querySelectorAll('dialog.feature-modal').forEach(function (dlg) {
            dlg.querySelectorAll('[data-close-modal]').forEach(function (btn) {
                btn.addEventListener('click', function () { dlg.close(); });
            });
            dlg.addEventListener('click', function (e) { if (e.target === dlg) dlg.close(); });
        });
    });
</script>
