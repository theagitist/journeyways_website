<?php
// Design philosophy page body. Chrome comes from partials/head + footer. Translatable text via t().
$P = 'pages.design';
?>
<style>
    .black-card-panel {
        background-image: url('/img/design/bg-black.webp');
        background-size: cover;
        background-position: center;
    }
</style>

    <main>

    <!-- ===== Hero: editorial split ===== -->
    <section class="relative pt-24 md:pt-32 pb-12 md:pb-16 md:min-h-[60vh] flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-center">
                <div class="col-span-12 md:col-span-5 md:order-1 order-2">
                    <figure class="hero-mask m-0">
                        <img src="/img/design/tile-start.webp" alt="<?= te("$P.hero.image_alt") ?>" class="w-full h-auto block" loading="lazy">
                    </figure>
                </div>
                <div class="col-span-12 md:col-span-7 md:order-2 order-1">
                    <div class="flex items-center gap-2 mb-6 text-xs uppercase tracking-[0.25em] text-yellow-400/80">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" aria-hidden="true">
                            <path d="M12 7v14"/>
                            <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/>
                        </svg>
                        <span><?= te("$P.hero.eyebrow") ?></span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white tracking-tight leading-[1.05] mb-3 md:mb-4"><?= te("$P.hero.title") ?></h1>
                    <p class="text-base md:text-lg italic font-light text-gray-300 mb-8 md:mb-10 max-w-prose"><?= te("$P.hero.tagline") ?></p>
                    <p class="text-base md:text-lg text-gray-400 leading-relaxed max-w-prose mb-6">
                        <?= te("$P.hero.lead") ?>
                    </p>
                    <p class="text-sm md:text-base text-gray-400 leading-relaxed max-w-prose">
                        <a href="<?= esc(jw_page_url('/about.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.about") ?></a> &middot; <a href="<?= esc(jw_page_url('/references.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.references") ?></a> &middot; <a href="https://grsj.arts.ubc.ca/" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.grsj") ?></a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Premise (a quiet eyebrow before the principles begin) ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="premise">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-blue.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.premise.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="premise" class="sr-only"><?= te("$P.premise.sr_heading") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= t("$P.premise.body") ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.premise.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 1. Identity ===== -->
    <section id="identity" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="identity-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.identity.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="identity-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.identity.title") ?></h2>
                    <figure class="mb-8">
                        <img src="/img/design/card-box-not-yet.webp" alt="<?= te("$P.identity.fig_alt") ?>" class="w-full block" loading="lazy">
                        <figcaption class="text-sm text-gray-400 italic mt-3"><?= t("$P.identity.fig_caption") ?></figcaption>
                    </figure>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.identity.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.identity.body_2") ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.identity.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 2. Stakes ===== -->
    <section id="no-winning" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="stakes-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-black.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.stakes.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="stakes-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.stakes.title") ?></h2>
                    <div class="black-card-panel p-10 md:p-14 mb-8 text-center" role="img" aria-label="<?= te("$P.stakes.panel_aria") ?>">
                        <p class="text-2xl md:text-3xl font-light text-gray-100 italic leading-snug">
                            <?= t("$P.stakes.panel_quote") ?>
                        </p>
                        <p class="text-[10px] uppercase tracking-[0.3em] text-gray-400 mt-5 not-italic"><?= t("$P.stakes.panel_label") ?></p>
                    </div>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= t("$P.stakes.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= t("$P.stakes.body_2") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.stakes.body_3") ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 3. Consent ===== -->
    <section id="consent" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="consent-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-purple.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.consent.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="consent-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.consent.title") ?></h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <figure>
                            <img src="/img/design/tile-star-bridge.webp" alt="<?= te("$P.consent.fig1_alt") ?>" class="w-full block" loading="lazy">
                            <figcaption class="text-xs text-gray-400 italic mt-3"><?= t("$P.consent.fig1_caption") ?></figcaption>
                        </figure>
                        <figure>
                            <img src="/img/design/card-map.webp" alt="<?= te("$P.consent.fig2_alt") ?>" class="w-full block" loading="lazy">
                            <figcaption class="text-xs text-gray-400 italic mt-3"><?= t("$P.consent.fig2_caption") ?></figcaption>
                        </figure>
                    </div>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.consent.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.consent.body_2") ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.consent.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-10">
                        <?= te("$P.consent.body_3") ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 4. Voice ===== -->
    <section id="elicit" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="voice-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.voice.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="voice-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.voice.title") ?></h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                        <figure>
                            <img src="/img/design/card-memory.webp" alt="<?= te("$P.voice.fig1_alt") ?>" class="w-full block" loading="lazy">
                            <figcaption class="text-xs text-gray-400 italic mt-3"><?= t("$P.voice.fig1_caption") ?></figcaption>
                        </figure>
                        <figure>
                            <img src="/img/design/card-reminiscence.webp" alt="<?= te("$P.voice.fig2_alt") ?>" class="w-full block" loading="lazy">
                            <figcaption class="text-xs text-gray-400 italic mt-3"><?= t("$P.voice.fig2_caption") ?></figcaption>
                        </figure>
                        <figure>
                            <img src="/img/design/card-encounter.webp" alt="<?= te("$P.voice.fig3_alt") ?>" class="w-full block" loading="lazy">
                            <figcaption class="text-xs text-gray-400 italic mt-3"><?= t("$P.voice.fig3_caption") ?></figcaption>
                        </figure>
                    </div>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= t("$P.voice.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= t("$P.voice.body_2") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.voice.body_3") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.voice.body_4") ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 5. Meeting ===== -->
    <section id="combination" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="meeting-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-blue.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.meeting.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="meeting-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.meeting.title") ?></h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                        <figure>
                            <img src="/img/design/tile-singing-cave.webp" alt="<?= te("$P.meeting.fig1_alt") ?>" class="w-full block" loading="lazy">
                            <figcaption class="text-xs text-gray-400 italic mt-3"><?= t("$P.meeting.fig1_caption") ?></figcaption>
                        </figure>
                        <figure>
                            <img src="/img/design/card-mirror.webp" alt="<?= te("$P.meeting.fig2_alt") ?>" class="w-full block" loading="lazy">
                            <figcaption class="text-xs text-gray-400 italic mt-3"><?= t("$P.meeting.fig2_caption") ?></figcaption>
                        </figure>
                        <figure>
                            <img src="/img/design/tile-study-room.webp" alt="<?= te("$P.meeting.fig3_alt") ?>" class="w-full block" loading="lazy">
                            <figcaption class="text-xs text-gray-400 italic mt-3"><?= t("$P.meeting.fig3_caption") ?></figcaption>
                        </figure>
                    </div>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.meeting.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.meeting.body_2") ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.meeting.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 6. Modality ===== -->
    <section id="expression" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="modality-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-green.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.modality.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="modality-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.modality.title") ?></h2>
                    <figure class="mb-8">
                        <img src="/img/edges_playtest_journaling.webp" alt="<?= te("$P.modality.fig_alt") ?>" class="w-full block" loading="lazy">
                        <figcaption class="text-sm text-gray-400 italic mt-3"><?= te("$P.modality.fig_caption") ?></figcaption>
                    </figure>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.modality.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.modality.body_2") ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.modality.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-10">
                        <?= te("$P.modality.body_3") ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 7. Hand ===== -->
    <section id="materials" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="hand-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-black.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.hand.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="hand-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.hand.title") ?></h2>
                    <figure class="mb-8">
                        <img src="/img/design/tile-mirror-lake.webp" alt="<?= te("$P.hand.fig_alt") ?>" class="w-full block" loading="lazy">
                        <figcaption class="text-sm text-gray-400 italic mt-3"><?= t("$P.hand.fig_caption") ?></figcaption>
                    </figure>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.hand.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.hand.body_2") ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.hand.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 8. Frame ===== -->
    <section id="framework" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="frame-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-purple.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.frame.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="frame-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.frame.title") ?></h2>
                    <figure class="mb-8">
                        <img src="/img/boardgame_components.webp" alt="<?= te("$P.frame.fig_alt") ?>" class="w-full block" loading="lazy">
                        <figcaption class="text-sm text-gray-400 italic mt-3"><?= te("$P.frame.fig_caption") ?></figcaption>
                    </figure>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= t("$P.frame.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.frame.body_2") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= sprintf(t("$P.frame.body_3"),
                            esc(jw_page_url('/components-cards.html', $JW_LANG)),
                            esc(jw_page_url('/components-tiles.html', $JW_LANG))) ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.frame.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 9. Reach ===== -->
    <section id="shared" class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="reach-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-green.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.reach.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="reach-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.reach.title") ?></h2>
                    <figure class="mb-8">
                        <img src="/img/design/assorted-six-meeples.webp" alt="<?= te("$P.reach.fig_alt") ?>" class="w-full block" loading="lazy">
                        <figcaption class="text-sm text-gray-400 italic mt-3"><?= te("$P.reach.fig_caption") ?></figcaption>
                    </figure>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.reach.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= t("$P.reach.body_2") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= t("$P.reach.body_3") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.reach.body_4") ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Coda ===== -->
    <section id="closing" class="pt-12 md:pt-16 pb-16 md:pb-24 border-t border-gray-700/40 scroll-mt-24" aria-labelledby="coda-title">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-blue.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.coda.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="coda-title" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-6"><?= te("$P.coda.title") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.coda.body_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.coda.body_2") ?>
                    </p>
                    <blockquote class="mt-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.coda.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                    <p class="text-sm text-gray-400 mt-12">
                        <?= sprintf(t("$P.coda.footer_note"),
                            esc(jw_page_url('/about.html', $JW_LANG))) ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    </main>
