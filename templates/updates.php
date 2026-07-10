<?php
// Updates page body. Chrome comes from partials/head + footer. Translatable text via t().
// The client-side game filter (js/main.js initUpdatesFilter) drives visibility purely
// off the data-month / data-type / data-filter attributes and the .jw-tl-month / .jw-card
// classes. Those attribute VALUES are structural, never translated: they come from the
// dictionary arrays (month id, item type) but are identical across all languages.
$P = 'pages.updates';

// Resolve an internal English path (optionally with a #anchor) to its localized URL.
$jwLink = function (string $href) use ($JW_LANG): string {
    $path = strtok($href, '#');
    $frag = strpos($href, '#') !== false ? substr($href, strpos($href, '#')) : '';
    return esc(jw_page_url($path, $JW_LANG) . $frag);
};

$tags   = jw_get("$P.tags");     // ['board' => ..., 'video' => ...]
$months = jw_get("$P.months");   // newest-first list of month sections
?>
<main>

    <!-- ===== Hero: typographic title block ===== -->
    <section class="pt-24 md:pt-32 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <div class="flex items-center gap-2 mb-6 text-xs uppercase tracking-[0.25em] text-yellow-400/80">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 7v5l3 2"/>
                    </svg>
                    <span><?= te("$P.hero.eyebrow") ?></span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white tracking-tight leading-[1.05] mb-3 md:mb-4"><?= te("$P.hero.title") ?></h1>
                <p class="text-base md:text-lg italic font-light text-gray-300 mb-6 md:mb-8"><?= te("$P.hero.tagline") ?></p>
                <p class="text-base md:text-lg text-gray-400 leading-relaxed">
                    <?= te("$P.hero.body") ?>
                </p>
            </div>
        </div>
    </section>

    <!-- ===== Timeline ===== -->
    <section class="pt-12 md:pt-16 pb-16 md:pb-24 border-t border-gray-700/40" aria-labelledby="timeline-heading">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.timeline.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="timeline-heading" class="sr-only"><?= te("$P.timeline.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-8"><?= te("$P.timeline.intro") ?></p>

            <div id="updates-filter" class="jw-filter mb-4" role="group" aria-label="<?= te("$P.filter.aria") ?>">
                <button type="button" data-filter="all" aria-pressed="true"><?= te("$P.filter.all") ?></button>
                <button type="button" data-filter="board" aria-pressed="false"><?= te("$P.filter.board") ?></button>
                <button type="button" data-filter="video" aria-pressed="false"><?= te("$P.filter.video") ?></button>
            </div>

            <div id="updates-months" class="jw-tabs" role="tablist" aria-label="<?= te("$P.months_aria") ?>">
                <button type="button" role="tab" data-month="all" aria-selected="true"><?= te("$P.months_all") ?></button>
<?php foreach ($months as $m): ?>
                <button type="button" role="tab" data-month="<?= esc($m['id']) ?>" aria-selected="false"><?= esc($m['tab']) ?></button>
<?php endforeach; ?>
            </div>


            <div class="jw-tl">

<?php foreach ($months as $m): ?>
                <div class="jw-tl-month" data-month="<?= esc($m['id']) ?>">
                    <div class="jw-tl-label"><span class="jw-dot"></span><span class="jw-when"><?= esc($m['label']) ?></span><span class="jw-rule"></span></div>
                    <div class="jw-cards">
<?php foreach ($m['items'] as $item): $type = $item['type']; ?>
                        <article class="jw-card" data-type="<?= esc($type) ?>">
                            <?php if ($type === 'both' || $type === 'board'): ?><span class="jw-tag jw-tag--board"><?= esc($tags['board']) ?></span><?php endif; ?><?php if ($type === 'both' || $type === 'video'): ?><span class="jw-tag jw-tag--video"><?= esc($tags['video']) ?></span><?php endif; ?>
                            <h3 class="jw-card-title"><?= esc($item['title']) ?></h3>
                            <p class="jw-card-text"><?php
                                if (!empty($item['links'])) {
                                    echo vsprintf($item['body'], array_map($jwLink, $item['links']));
                                } else {
                                    echo $item['body'];
                                }
                            ?></p>
                        </article>
<?php endforeach; ?>
                    </div>
                </div>

<?php endforeach; ?>
            </div>

                    <p class="text-sm text-gray-500 mt-8"><?= sprintf(t("$P.timeline.footer_html"), $jwLink('/videogame.html#roadmap')) ?></p>
                </div>
            </div>
        </div>
    </section>

    </main>
