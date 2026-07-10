<?php
// Board game (how to play) page body. Chrome comes from partials/head + footer. Translatable text via t().
$P = 'pages.boardgame';

// Structural (non-translatable) data paired with dict text by index.
// Card backs / decks: [image path, card-colour class, gallery index].
$deckBacks = [
    ['/img/design/bg-red.webp',    'card-red',    0],
    ['/img/design/bg-green.webp',  'card-green',  1],
    ['/img/design/bg-blue.webp',   'card-blue',   2],
    ['/img/design/bg-black.webp',  'card-black',  3],
    ['/img/design/bg-purple.webp', 'card-purple', 4],
];
// Map tiles: [image path, gallery index].
$mapTiles = [
    ['/img/design/tile-mirror-lake.webp',         0],
    ['/img/design/tile-star-bridge.webp',         1],
    ['/img/design/tile-singing-cave.webp',        2],
    ['/img/design/tile-mountain-peak.webp',       3],
    ['/img/design/tile-childhood-house.webp',     4],
    ['/img/design/tile-study-room.webp',          5],
    ['/img/design/tile-volcanic-ground.webp',     6],
    ['/img/design/tile-tree-hollow.webp',         7],
    ['/img/design/tile-buried-names-field.webp',  8],
    ['/img/design/tile-misty-trail.webp',         9],
    ['/img/design/tile-night-way.webp',          10],
    ['/img/design/tile-abandoned-playground.webp', 11],
];
// Card fronts: [image path, card-colour class, gallery index].
$cardFronts = [
    ['/img/design/card-box-not-yet.webp',  'card-red',    0],
    ['/img/design/card-reminiscence.webp', 'card-green',  1],
    ['/img/design/card-encounter.webp',    'card-purple', 2],
    ['/img/design/card-mirror.webp',       'card-red',    3],
    ['/img/design/card-commune.webp',      'card-purple', 4],
    ['/img/design/card-map.webp',          'card-red',    5],
    ['/img/design/card-memory.webp',       'card-red',    6],
    ['/img/design/card-echo.webp',         'card-red',    7],
    ['/img/design/card-wind.webp',         'card-red',    8],
];
?>
<main>

    <!-- ===== Hero: large rulebook cover + title block side-by-side ===== -->
    <section class="pt-24 md:pt-28 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <div class="col-span-12 md:col-span-5">
                    <figure class="m-0 shadow-lg max-w-md mx-auto md:mx-0">
                        <img src="/img/rulebook_cover.webp" alt="<?= te("$P.hero.cover_alt") ?>" class="w-full h-auto block" loading="eager">
                    </figure>
                </div>
                <div class="col-span-12 md:col-span-7">
                    <div class="flex items-center gap-2 mb-6 text-xs uppercase tracking-[0.25em] text-yellow-400/80">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" aria-hidden="true">
                            <path d="M10 2v8l3-3 3 3V2"/>
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/>
                        </svg>
                        <span><?= te("$P.hero.eyebrow") ?></span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white tracking-tight leading-[1.05] mb-3 md:mb-4"><?= te("$P.hero.title") ?></h1>
                    <p class="text-base md:text-lg italic font-light text-gray-300 mb-6 md:mb-8 max-w-prose"><?= te("$P.hero.tagline") ?></p>
                    <p class="text-base md:text-lg text-gray-400 leading-relaxed max-w-prose mb-6">
                        <?= te("$P.hero.intro") ?>
                    </p>
                    <p class="text-sm md:text-base text-gray-400">
                        <?= te("$P.hero.rulebook_label") ?>
                        <a href="/download/JOURNEYWAYS Game Rules 1.0 EN.pdf?v=3" download class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.langs.en") ?></a>
                        &middot;
                        <a href="/download/JOURNEYWAYS Game Rules 1.0 ES.pdf?v=3" download class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.langs.es") ?></a>
                        &middot;
                        <a href="/download/JOURNEYWAYS Game Rules 1.0 FR.pdf?v=3" download class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.langs.fr") ?></a>
                    </p>
                    <p class="text-sm md:text-base text-gray-400 mt-1">
                        <?= te("$P.hero.booklet_label") ?>
                        <a href="/download/JOURNEYWAYS Player Booklet 1.0 EN.pdf?v=3" download class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.langs.en") ?></a>
                        &middot;
                        <a href="/download/JOURNEYWAYS Player Booklet 1.0 ES.pdf?v=3" download class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.langs.es") ?></a>
                        &middot;
                        <a href="/download/JOURNEYWAYS Player Booklet 1.0 FR.pdf?v=3" download class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.langs.fr") ?></a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Decks (5 card backs as the game's color system) ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="decks">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-blue.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.decks.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="decks" class="sr-only"><?= te("$P.decks.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-8">
                        <?= te("$P.decks.intro") ?>
                    </p>
                    <div class="grid grid-cols-3 md:grid-cols-5 gap-3 max-w-4xl">
<?php foreach ($deckBacks as $i => [$src, $cls, $idx]): $c = "$P.decks.chips.$i"; ?>
                        <div>
                            <img src="<?= esc($src) ?>" alt="<?= te("$c.alt") ?>" class="w-full aspect-[3/4] object-cover rounded shadow-md cursor-pointer" onclick="openLightboxFromSet('boardgameCardBacks', <?= $idx ?>)" loading="lazy">
                            <p class="text-xs italic text-center mt-2"><span class="<?= esc($cls) ?>"><?= te("$c.color") ?></span> | <?= te("$c.category") ?></p>
                        </div>
<?php endforeach; ?>
                    </div>
                    <p class="text-sm md:text-base text-gray-400 mt-6">
                        <?= sprintf(t("$P.decks.browse_html"), esc(jw_page_url('/components-cards.html', $JW_LANG))) ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Setup ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="setup">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.setup.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="setup" class="sr-only"><?= te("$P.setup.sr_heading") ?></h2>
                    <div class="grid md:grid-cols-2 gap-8 md:gap-10 mb-10">
                        <div>
                            <h3 class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.setup.need_heading") ?></h3>
                            <ul class="space-y-2 text-gray-300 text-base leading-relaxed">
<?php foreach (jw_get("$P.setup.need") as $item): ?>
                                <li><?= $item ?></li>
<?php endforeach; ?>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.setup.initial_heading") ?></h3>
                            <ol class="space-y-3 text-gray-300 text-base leading-relaxed list-decimal list-outside ml-5 marker:text-yellow-400/60 marker:font-medium">
<?php foreach (jw_get("$P.setup.steps") as $item): ?>
                                <li><?= $item ?></li>
<?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                    <figure class="m-0">
                        <img src="/img/boardgame_setup.webp" alt="<?= te("$P.setup.figure_alt") ?>" class="w-full block cursor-pointer" onclick="openLightboxFromSet('boardgameSetup', 0)" loading="lazy">
                        <figcaption class="text-sm text-gray-400 italic mt-3"><?= te("$P.setup.figcaption") ?></figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Turn ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="turn">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-green.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.turn.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="turn" class="sr-only"><?= te("$P.turn.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-10">
                        <?= t("$P.turn.intro_html") ?>
                    </p>
                    <div class="grid md:grid-cols-3 gap-px bg-gray-700/40 border border-gray-700/40 mb-10">
<?php foreach (jw_get("$P.turn.phases") as $ph): ?>
                        <div class="bg-gray-800 p-6 md:p-7">
                            <p class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-3"><?= esc($ph['eyebrow']) ?></p>
                            <h3 class="text-xl font-medium text-white tracking-tight mb-3"><?= esc($ph['title']) ?></h3>
                            <p class="text-sm text-gray-300 leading-relaxed"><?= $ph['body_html'] ?></p>
                        </div>
<?php endforeach; ?>
                    </div>

                    <figure class="m-0 mb-10">
                        <p class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= t("$P.turn.tiles_label_html") ?></p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
<?php foreach ($mapTiles as $i => [$src, $idx]): $c = "$P.turn.tiles.$i"; ?>
                            <div>
                                <img src="<?= esc($src) ?>" alt="<?= te("$c.alt") ?>" class="w-full cursor-pointer" onclick="openLightboxFromSet('boardgameTiles', <?= $idx ?>)" loading="lazy">
                                <p class="text-xs text-gray-400 italic text-center mt-2"><?= te("$c.name") ?></p>
                            </div>
<?php endforeach; ?>
                        </div>
                        <figcaption class="text-sm md:text-base text-gray-400 mt-4">
                            <?= sprintf(t("$P.turn.tiles_browse_html"), esc(jw_page_url('/components-tiles.html', $JW_LANG))) ?>
                        </figcaption>
                    </figure>

                    <figure class="m-0">
                        <p class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.turn.fronts_label") ?></p>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
<?php foreach ($cardFronts as $i => [$src, $cls, $idx]): $c = "$P.turn.fronts.$i"; ?>
                            <div>
                                <img src="<?= esc($src) ?>" alt="<?= te("$c.alt") ?>" class="w-full cursor-pointer" onclick="openLightboxFromSet('boardgameCardFronts', <?= $idx ?>)" loading="lazy">
                                <p class="text-xs italic text-center mt-2"><span class="<?= esc($cls) ?>"><?= te("$c.category") ?></span> (<?= te("$c.color") ?>)</p>
                            </div>
<?php endforeach; ?>
                        </div>
                        <figcaption class="text-sm md:text-base text-gray-400 mt-4">
                            <?= sprintf(t("$P.turn.fronts_browse_html"), esc(jw_page_url('/components-cards.html', $JW_LANG))) ?>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Ending ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="ending">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-black.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.ending.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="ending" class="sr-only"><?= te("$P.ending.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= t("$P.ending.p1_html") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.ending.p2") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.ending.p3") ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.ending.quote") ?></p>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Journal ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="journal">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-blue.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.journal.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="journal" class="sr-only"><?= te("$P.journal.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.journal.p1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.journal.p2") ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Modes ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="modes">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-purple.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.modes.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="modes" class="sr-only"><?= te("$P.modes.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-10">
                        <?= te("$P.modes.intro") ?>
                    </p>
                    <div class="grid md:grid-cols-2 gap-8 md:gap-10">
                        <div>
                            <h3 class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.modes.solo_heading") ?></h3>
                            <ul class="space-y-2 text-gray-300 text-base leading-relaxed">
<?php foreach (jw_get("$P.modes.solo") as $item): ?>
                                <li><?= $item ?></li>
<?php endforeach; ?>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.modes.group_heading") ?></h3>
                            <ul class="space-y-2 text-gray-300 text-base leading-relaxed">
<?php foreach (jw_get("$P.modes.group") as $item): ?>
                                <li><?= $item ?></li>
<?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Open play ===== -->
    <section class="pt-12 md:pt-16 pb-20 md:pb-28 border-t border-gray-700/40" aria-labelledby="open-play">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.open.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="open-play" class="sr-only"><?= te("$P.open.sr_heading") ?></h2>
                    <div class="grid md:grid-cols-2 gap-8 md:gap-10 mb-10">
                        <div>
                            <h3 class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.open.returning_heading") ?></h3>
                            <p class="text-gray-300 text-base leading-relaxed">
                                <?= te("$P.open.returning_body") ?>
                            </p>
                        </div>
                        <div>
                            <h3 class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.open.makeyourown_heading") ?></h3>
                            <p class="text-gray-300 text-base leading-relaxed">
                                <?= te("$P.open.makeyourown_body") ?>
                            </p>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8 md:gap-10">
                        <div>
                            <h3 class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.open.setting_heading") ?></h3>
                            <ul class="space-y-2 text-gray-300 text-base leading-relaxed">
<?php foreach (jw_get("$P.open.setting") as $item): ?>
                                <li><?= $item ?></li>
<?php endforeach; ?>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4"><?= te("$P.open.deeper_heading") ?></h3>
                            <ul class="space-y-2 text-gray-300 text-base leading-relaxed">
<?php foreach (jw_get("$P.open.deeper") as $item): ?>
                                <li><?= $item ?></li>
<?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>
