<?php
// Photos (research gallery) page body. Chrome comes from partials/head + footer. Translatable text via t().
// Lightbox captions come from lang/*/js.json (the "photos" set); onclick="openLightbox(N)" indices are stable.
$P = 'pages.photos';
?>
<main>

    <!-- ===== Hero: title block, then 4-photo tile band below ===== -->
    <section class="pt-24 md:pt-32 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Title block -->
            <div class="max-w-3xl mb-12 md:mb-16">
                <div class="flex items-center gap-2 mb-6 text-xs uppercase tracking-[0.25em] text-yellow-400/80">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" aria-hidden="true">
                        <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/>
                        <circle cx="12" cy="13" r="3"/>
                    </svg>
                    <span><?= te("$P.hero.eyebrow") ?></span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white tracking-tight leading-[1.05] mb-3 md:mb-4"><?= te("$P.hero.title") ?></h1>
                <p class="text-base md:text-lg italic font-light text-gray-300 mb-6 md:mb-8"><?= te("$P.hero.tagline") ?></p>
                <p class="text-base md:text-lg text-gray-400 leading-relaxed">
                    <?= te("$P.hero.lead") ?>
                </p>
                <p class="mt-6 text-sm md:text-base text-gray-400">
                    <a href="<?= esc(jw_page_url('/design.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.design") ?></a> &middot; <a href="<?= esc(jw_page_url('/boardgame.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.play") ?></a>
                </p>
            </div>
            <!-- 4-photo tile band: the Play group (sessions in progress) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-3">
                <figure class="m-0 aspect-square overflow-hidden">
                    <img src="/img/players_in_action.webp" alt="<?= te("$P.play.alt_players") ?>" class="w-full h-full object-cover block cursor-pointer transition-opacity hover:opacity-80" onclick="openLightbox(2)" loading="eager">
                </figure>
                <figure class="m-0 aspect-square overflow-hidden">
                    <img src="/img/edges_playtest_journaling.webp" alt="<?= te("$P.play.alt_journaling") ?>" class="w-full h-full object-cover block cursor-pointer transition-opacity hover:opacity-80" onclick="openLightbox(3)" loading="eager">
                </figure>
                <figure class="m-0 aspect-square overflow-hidden">
                    <img src="/img/edges_playtest_table.webp" alt="<?= te("$P.play.alt_table") ?>" class="w-full h-full object-cover block cursor-pointer transition-opacity hover:opacity-80" onclick="openLightbox(4)" loading="lazy">
                </figure>
                <figure class="m-0 aspect-square overflow-hidden">
                    <img src="/img/edges_playtest_board.webp" alt="<?= te("$P.play.alt_board") ?>" class="w-full h-full object-cover block cursor-pointer transition-opacity hover:opacity-80" onclick="openLightbox(5)" loading="lazy">
                </figure>
            </div>
        </div>
    </section>

    <!-- ===== Hall (ProtoConBC, the field) ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="hall">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-purple.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.hall.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="hall" class="sr-only"><?= te("$P.hall.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-8">
                        <?= te("$P.hall.intro") ?>
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <figure class="gallery-item">
                            <img src="/img/thumbnails/protoconbc_table_thumb.jpg" alt="<?= te("$P.hall.table.alt") ?>" class="w-full h-64 object-cover cursor-pointer" onclick="openLightbox(6)" loading="lazy">
                            <figcaption class="pt-3">
                                <h3 class="text-base font-medium text-white"><?= te("$P.hall.table.title") ?></h3>
                                <p class="text-sm text-gray-400 leading-relaxed mt-1"><?= te("$P.hall.table.caption") ?></p>
                            </figcaption>
                        </figure>
                        <figure class="gallery-item">
                            <img src="/img/thumbnails/protoconbc_hall_thumb.jpg" alt="<?= te("$P.hall.hall.alt") ?>" class="w-full h-64 object-cover cursor-pointer" onclick="openLightbox(7)" loading="lazy">
                            <figcaption class="pt-3">
                                <h3 class="text-base font-medium text-white"><?= te("$P.hall.hall.title") ?></h3>
                                <p class="text-sm text-gray-400 leading-relaxed mt-1"><?= te("$P.hall.hall.caption") ?></p>
                            </figcaption>
                        </figure>
                        <figure class="gallery-item">
                            <img src="/img/thumbnails/protoconbc_pair_thumb.jpg" alt="<?= te("$P.hall.pair.alt") ?>" class="w-full h-64 object-cover cursor-pointer" onclick="openLightbox(8)" loading="lazy">
                            <figcaption class="pt-3">
                                <h3 class="text-base font-medium text-white"><?= te("$P.hall.pair.title") ?></h3>
                                <p class="text-sm text-gray-400 leading-relaxed mt-1"><?= te("$P.hall.pair.caption") ?></p>
                            </figcaption>
                        </figure>
                        <figure class="gallery-item">
                            <img src="/img/thumbnails/protoconbc_session_thumb.jpg" alt="<?= te("$P.hall.session.alt") ?>" class="w-full h-64 object-cover cursor-pointer" onclick="openLightbox(9)" loading="lazy">
                            <figcaption class="pt-3">
                                <h3 class="text-base font-medium text-white"><?= te("$P.hall.session.title") ?></h3>
                                <p class="text-sm text-gray-400 leading-relaxed mt-1"><?= te("$P.hall.session.caption") ?></p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Pieces ===== -->
    <section class="pt-12 md:pt-16 pb-16 md:pb-24 border-t border-gray-700/40" aria-labelledby="pieces">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.pieces.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="pieces" class="sr-only"><?= te("$P.pieces.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-8">
                        <?= te("$P.pieces.intro") ?>
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <figure class="gallery-item">
                            <img src="/img/thumbnails/boardgame_setup_thumb.jpg" alt="<?= te("$P.pieces.setup.alt") ?>" class="w-full h-64 object-cover cursor-pointer" onclick="openLightbox(0)" loading="lazy">
                            <figcaption class="pt-3">
                                <h3 class="text-base font-medium text-white"><?= te("$P.pieces.setup.title") ?></h3>
                                <p class="text-sm text-gray-400 leading-relaxed mt-1"><?= te("$P.pieces.setup.caption") ?></p>
                            </figcaption>
                        </figure>
                        <figure class="gallery-item">
                            <img src="/img/thumbnails/boardgame_components_thumb.jpg" alt="<?= te("$P.pieces.components.alt") ?>" class="w-full h-64 object-cover cursor-pointer" onclick="openLightbox(1)" loading="lazy">
                            <figcaption class="pt-3">
                                <h3 class="text-base font-medium text-white"><?= te("$P.pieces.components.title") ?></h3>
                                <p class="text-sm text-gray-400 leading-relaxed mt-1"><?= te("$P.pieces.components.caption") ?></p>
                            </figcaption>
                        </figure>
                    </div>
                    <p class="text-xs text-gray-500 italic mt-8"><?= te("$P.pieces.enlarge_note") ?></p>
                </div>
            </div>
        </div>
    </section>

    </main>

    <!-- Lightbox Modal -->
