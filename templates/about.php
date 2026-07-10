<?php
// About page body. Chrome comes from partials/head + footer. Translatable text via t().
$P = 'pages.about';
?>
<main>

    <!-- ===== Hero: editorial split (research photo as anchor, asymmetric grid) ===== -->
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
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white tracking-tight leading-[1.05] mb-3 md:mb-4"><?= te("$P.hero.title") ?></h1>
                    <p class="text-base md:text-lg italic font-light text-gray-300 mb-8 md:mb-10 max-w-prose"><?= te("$P.hero.tagline") ?></p>
                    <p class="text-base md:text-lg text-gray-400 leading-relaxed max-w-prose">
                        <?= te("$P.hero.lead") ?>
                    </p>
                    <p class="mt-6 text-sm md:text-base text-gray-400 leading-relaxed max-w-prose">
                        <a href="<?= esc(jw_page_url('/design.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.design") ?></a> &middot; <a href="<?= esc(jw_page_url('/references.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.references") ?></a> &middot; <a href="<?= esc(jw_page_url('/presentation.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.presentation") ?></a> &middot; <a href="https://grsj.arts.ubc.ca/" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.grsj") ?></a>
                    </p>
                </div>
                <div class="col-span-12 md:col-span-5">
                    <figure class="hero-mask m-0">
                        <img src="/img/adri_self_portrait.webp" alt="<?= te("$P.hero.image_alt") ?>" class="w-full h-auto block" loading="lazy">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Researcher (Chapter I) ===== -->
    <section class="pt-12 md:pt-16 pb-4 md:pb-6 border-t border-gray-700/40" aria-labelledby="bio">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-red.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.researcher.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="bio" class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-5"><?= te("$P.researcher.byline") ?></h2>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= t("$P.researcher.bio_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= te("$P.researcher.bio_2") ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Project (Chapter II) ===== -->
    <section class="pt-8 md:pt-12 pb-16 md:pb-24 border-t border-gray-700/40" aria-labelledby="on-the-project">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/bg-blue.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$P.project.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="on-the-project" class="sr-only"><?= te("$P.project.sr_heading") ?></h2>
                    <blockquote class="mb-10 max-w-prose">
                        <p class="text-2xl md:text-3xl italic font-light text-gray-100 leading-[1.3] tracking-tight"><?= te("$P.project.quote") ?></p>
                        <footer class="mt-4 text-[10px] uppercase tracking-[0.3em] text-gray-400">Adri M.</footer>
                    </blockquote>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                        <?= te("$P.project.p_1") ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= sprintf(t("$P.project.p_2"),
                            esc(jw_page_url('/design.html', $JW_LANG) . '#identity'),
                            esc(jw_page_url('/design.html', $JW_LANG) . '#no-winning'),
                            esc(jw_page_url('/design.html', $JW_LANG) . '#expression')) ?>
                    </p>
                    <p class="text-gray-300 text-base md:text-lg leading-[1.75] mt-6">
                        <?= sprintf(t("$P.project.p_3"),
                            esc(jw_page_url('/design.html', $JW_LANG) . '#shared'),
                            esc(jw_page_url('/references.html', $JW_LANG))) ?>
                    </p>

                    <!-- "Get in touch" section hidden until a direct contact channel is functional. Restore by uncommenting and updating to match the editorial spine pattern. -->
                    <!--
                    <section aria-labelledby="contact" class="mt-12 pt-8 border-t border-gray-700/40">
                        <h2 id="contact" class="text-[10px] uppercase tracking-[0.3em] text-yellow-400/80 mb-4">Get in touch</h2>
                        <p class="text-gray-300 text-base md:text-lg leading-[1.75]">
                            A direct contact channel is being set up. Until then, Adri can be reached through UBC GRSJ.
                        </p>
                    </section>
                    -->
                </div>
            </div>
        </div>
    </section>

    </main>
