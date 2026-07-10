<?php
// Digital game page body. Chrome comes from partials/head + footer. Translatable text via t().
$P = 'pages.videogame';
?>
<main>

    <!-- ===== Hero: centered title block + horizontal spec strip ===== -->
    <section class="pt-24 md:pt-28 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Centered title block -->
            <div class="max-w-3xl mx-auto text-center">
                <div class="flex items-center justify-center gap-2 mb-6 text-xs uppercase tracking-[0.25em] text-yellow-400/80">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" aria-hidden="true">
                        <rect width="20" height="14" x="2" y="3" rx="2"/>
                        <line x1="8" x2="16" y1="21" y2="21"/>
                        <line x1="12" x2="12" y1="17" y2="21"/>
                    </svg>
                    <span><?= te("$P.hero.eyebrow") ?></span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white tracking-tight leading-[1.05] mb-3 md:mb-4"><?= te("$P.hero.title") ?></h1>
                <p class="text-base md:text-lg italic font-light text-gray-300 mb-8 md:mb-10 max-w-prose mx-auto"><?= te("$P.hero.tagline") ?></p>
                <p class="text-base md:text-lg text-gray-400 leading-relaxed max-w-prose mx-auto">
                    <?= te("$P.hero.lead") ?>
                </p>
            </div>
            <!-- Horizontal spec strip -->
            <dl class="mt-10 md:mt-14 max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-6 gap-px bg-gray-700/40 border border-gray-700/40">
                <div class="bg-gray-800 px-4 py-5">
                    <dt class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-1.5"><?= te("$P.hero.spec.version_label") ?></dt>
                    <dd class="text-sm font-mono text-white">v0.7.0-alpha</dd>
                </div>
                <div class="bg-gray-800 px-4 py-5">
                    <dt class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-1.5"><?= te("$P.hero.spec.tagged_label") ?></dt>
                    <dd class="text-sm font-mono text-white"><?= te("$P.hero.spec.tagged_value") ?></dd>
                </div>
                <div class="bg-gray-800 px-4 py-5">
                    <dt class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-1.5"><?= te("$P.hero.spec.platform_label") ?></dt>
                    <dd class="text-sm font-mono text-white"><?= te("$P.hero.spec.platform_value") ?></dd>
                </div>
                <div class="bg-gray-800 px-4 py-5">
                    <dt class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-1.5"><?= te("$P.hero.spec.players_label") ?></dt>
                    <dd class="text-sm font-mono text-white"><?= te("$P.hero.spec.players_value") ?></dd>
                </div>
                <div class="bg-gray-800 px-4 py-5">
                    <dt class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-1.5"><?= te("$P.hero.spec.languages_label") ?></dt>
                    <dd class="text-sm font-mono text-white">EN &middot; ES &middot; FR</dd>
                </div>
                <div class="bg-gray-800 px-4 py-5">
                    <dt class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-1.5"><?= te("$P.hero.spec.source_label") ?></dt>
                    <dd class="text-sm font-mono text-white"><a href="https://github.com/theagitist/journeyways" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2">github</a></dd>
                </div>
            </dl>
            <p class="mt-4 text-xs text-gray-500 italic text-center max-w-5xl mx-auto"><?= te("$P.hero.spec.note") ?></p>
        </div>
    </section>

    <!-- ===== Premise ===== -->
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
                    <h2 id="premise" class="sr-only"><?= te("$P.premise.sr") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.premise.p1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.premise.p2") ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Built ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="built">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-green.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.built.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="built" class="sr-only"><?= te("$P.built.sr") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-8">
                        <?= te("$P.built.intro") ?>
                    </p>
                    <div class="grid sm:grid-cols-2 gap-px bg-gray-700/40 border border-gray-700/40 mb-10">
                        <div class="bg-gray-800 p-5 md:p-6">
                            <h3 class="text-base font-medium text-white tracking-tight mb-2"><?= te("$P.built.cards.multiplayer.title") ?></h3>
                            <p class="text-sm text-gray-400 leading-relaxed"><?= te("$P.built.cards.multiplayer.body") ?></p>
                        </div>
                        <div class="bg-gray-800 p-5 md:p-6">
                            <h3 class="text-base font-medium text-white tracking-tight mb-2"><?= te("$P.built.cards.cards.title") ?></h3>
                            <p class="text-sm text-gray-400 leading-relaxed"><?= sprintf(t("$P.built.cards.cards.body"), esc(jw_page_url('/components-cards.html', $JW_LANG))) ?></p>
                        </div>
                        <div class="bg-gray-800 p-5 md:p-6">
                            <h3 class="text-base font-medium text-white tracking-tight mb-2"><?= te("$P.built.cards.table.title") ?></h3>
                            <p class="text-sm text-gray-400 leading-relaxed"><?= te("$P.built.cards.table.body") ?></p>
                        </div>
                        <div class="bg-gray-800 p-5 md:p-6">
                            <h3 class="text-base font-medium text-white tracking-tight mb-2"><?= te("$P.built.cards.journal.title") ?></h3>
                            <p class="text-sm text-gray-400 leading-relaxed"><?= te("$P.built.cards.journal.body") ?></p>
                        </div>
                        <div class="bg-gray-800 p-5 md:p-6">
                            <h3 class="text-base font-medium text-white tracking-tight mb-2"><?= te("$P.built.cards.origins.title") ?></h3>
                            <p class="text-sm text-gray-400 leading-relaxed"><?= te("$P.built.cards.origins.body") ?></p>
                        </div>
                        <div class="bg-gray-800 p-5 md:p-6">
                            <h3 class="text-base font-medium text-white tracking-tight mb-2"><?= te("$P.built.cards.trilingual.title") ?></h3>
                            <p class="text-sm text-gray-400 leading-relaxed"><?= te("$P.built.cards.trilingual.body") ?></p>
                        </div>
                        <div class="bg-gray-800 p-5 md:p-6">
                            <h3 class="text-base font-medium text-white tracking-tight mb-2"><?= te("$P.built.cards.privacy.title") ?></h3>
                            <p class="text-sm text-gray-400 leading-relaxed"><?= te("$P.built.cards.privacy.body") ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== A look inside ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="screens">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.screens.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="screens" class="sr-only"><?= te("$P.screens.sr") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-8">
                        <?= te("$P.screens.intro") ?>
                    </p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <figure class="m-0">
                            <img src="/img/play/play-home.webp" alt="<?= te("$P.screens.front.alt") ?>" class="w-full aspect-[1400/897] object-cover rounded border border-gray-700/40 cursor-pointer hover:opacity-90 transition-opacity" onclick="openLightboxFromSet('videogameScreens', 0)" loading="lazy">
                            <figcaption class="text-[11px] text-gray-500 italic mt-2"><?= te("$P.screens.front.caption") ?></figcaption>
                        </figure>
                        <figure class="m-0">
                            <img src="/img/play/play-dashboard.webp" alt="<?= te("$P.screens.dashboard.alt") ?>" class="w-full aspect-[1400/897] object-cover rounded border border-gray-700/40 cursor-pointer hover:opacity-90 transition-opacity" onclick="openLightboxFromSet('videogameScreens', 1)" loading="lazy">
                            <figcaption class="text-[11px] text-gray-500 italic mt-2"><?= te("$P.screens.dashboard.caption") ?></figcaption>
                        </figure>
                        <figure class="m-0">
                            <img src="/img/play/play-tiles.webp" alt="<?= te("$P.screens.tiles.alt") ?>" class="w-full aspect-[1400/897] object-cover rounded border border-gray-700/40 cursor-pointer hover:opacity-90 transition-opacity" onclick="openLightboxFromSet('videogameScreens', 2)" loading="lazy">
                            <figcaption class="text-[11px] text-gray-500 italic mt-2"><?= te("$P.screens.tiles.caption") ?></figcaption>
                        </figure>
                        <figure class="m-0">
                            <img src="/img/play/play-room.webp" alt="<?= te("$P.screens.room.alt") ?>" class="w-full aspect-[1400/897] object-cover rounded border border-gray-700/40 cursor-pointer hover:opacity-90 transition-opacity" onclick="openLightboxFromSet('videogameScreens', 3)" loading="lazy">
                            <figcaption class="text-[11px] text-gray-500 italic mt-2"><?= te("$P.screens.room.caption") ?></figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Recent (moved to Updates) ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="recent">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-black.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.recent.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="recent" class="sr-only"><?= te("$P.recent.sr") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= sprintf(t("$P.recent.body"), esc(jw_page_url('/updates.html', $JW_LANG))) ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Roadmap ===== -->
    <section class="pt-12 md:pt-16 pb-16 md:pb-24 border-t border-gray-700/40" aria-labelledby="roadmap">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-purple.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.roadmap.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="roadmap" class="sr-only"><?= te("$P.roadmap.sr") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mb-8">
                        <?= te("$P.roadmap.intro") ?>
                    </p>
                    <ol class="space-y-6 list-none p-0 m-0">
<?php foreach (['print', 'story_loop', 'chat', 'export', 'mobile', 'docs', 'beta', 'hybrid'] as $r): $ri = "$P.roadmap.items.$r"; ?>
                        <li class="border-l-2 border-gray-700/60 pl-5">
                            <h3 class="text-base font-medium text-white tracking-tight mb-1.5"><?= te("$ri.title") ?></h3>
                            <p class="text-sm text-gray-400 leading-relaxed"><?= te("$ri.body") ?></p>
                        </li>
<?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div id="cta-container"></div>

    </main>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "VideoGame",
            "name": "JOURNEYWAYS (Digital)",
            "description": "The digital version of JOURNEYWAYS, in active development at v0.7.0-alpha. Real-time multiplayer, trilingual interface (English, Spanish, French), privacy by design (no camera), web-based with no install required. Designed for solo and group play.",
            "url": "https://www.journeyways.ca/videogame.html",
            "image": "https://www.journeyways.ca/img/og-card.webp",
            "applicationCategory": "GameApplication",
            "playMode": [
                "SinglePlayer",
                "MultiPlayer"
            ],
            "inLanguage": [
                "en",
                "es",
                "fr"
            ],
            "operatingSystem": "Web",
            "softwareVersion": "0.7.0-alpha",
            "genre": "Narrative, Identity Exploration, Collaborative Storytelling",
            "author": {
                "@type": "Person",
                "name": "Adri M.",
                "url": "https://www.journeyways.ca/about.html"
            },
            "publisher": {
                "@type": "Organization",
                "name": "UBC Institute for Gender, Race, Sexuality and Social Justice",
                "url": "https://grsj.arts.ubc.ca/"
            }
        }
    </script>
