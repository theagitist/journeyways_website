<?php
// References page body. Chrome comes from partials/head + footer. Translatable text via t().
// Bibliographic entries (citations) are left as literal HTML: author names, titles,
// publishers, journals and DOIs stay in their original language across all locales.
// Only the site's own prose (hero, section stamps/titles/subtitles) is translated.
$P = 'pages.references';

// Section chrome is structural; the entries are the (untranslated) citation lists.
$sections = [
    [
        'id' => 'theory', 'titleId' => 'theory-title', 'bg' => 'bg-red', 'key' => 'theory', 'pb' => 'pb-4 md:pb-6',
        'entries' => <<<'HTML'
                        <li>Butler, J. (1999). <em>Gender trouble: Tenth anniversary edition</em> (2nd ed.). Routledge. <a href="https://doi.org/10.4324/9780203902752" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.4324/9780203902752</a></li>
                        <li>Heyam, K. (2022). <em>Before we were trans: A new history of gender</em> (First US ed.). Seal Press.</li>
                        <li>Serano, J. (2007). <em>Whipping girl: A transsexual woman on sexism and the scapegoating of femininity.</em> Seal Press.</li>
                        <li>Stryker, S. (2008/2009). <em>Transgender history</em> (1st ed.). Seal Press.</li>
HTML,
    ],
    [
        'id' => 'data', 'titleId' => 'data-title', 'bg' => 'bg-blue', 'key' => 'data', 'pb' => 'pb-4 md:pb-6',
        'entries' => <<<'HTML'
                        <li>Ceja, A., Raygani, S., Conner, B. T., Lisha, N. E., Bryant-Lees, K. B., Lubensky, M. E., Lunn, M. R., Obedin-Maliver, J., &amp; Flentje, A. (2024). An automated algorithm for classifying expansive responses for gender identity. <em>Psychology of Sexual Orientation and Gender Diversity.</em> <a href="https://doi.org/10.1037/sgd0000762" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1037/sgd0000762</a></li>
                        <li>Chyten-Brennan, J., Patel, V. V., Ginsberg, M. S., &amp; Hanna, D. B. (2021). Algorithm to identify transgender and gender nonbinary individuals among people living with HIV performs differently by age and ethnicity. <em>Annals of Epidemiology, 54</em>, 73-78. <a href="https://doi.org/10.1016/j.annepidem.2020.09.013" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1016/j.annepidem.2020.09.013</a></li>
                        <li>Ghorbanian, A., Aiello, B., &amp; Staples, J. (2022). Under-representation of transgender identities in research: The limitations of traditional quantitative survey data. <em>Transgender Health, 7</em>(3), 261-269. <a href="https://doi.org/10.1089/trgh.2020.0107" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1089/trgh.2020.0107</a></li>
                        <li>Hines, N. G., Greene, D. N., Imborek, K. L., &amp; Krasowski, M. D. (2023). Patterns of gender identity data within electronic health record databases can be used as a tool for identifying and estimating the prevalence of gender-expansive people. <em>JAMIA Open, 6</em>(2), ooad042. <a href="https://doi.org/10.1093/jamiaopen/ooad042" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1093/jamiaopen/ooad042</a></li>
HTML,
    ],
    [
        'id' => 'arts-based', 'titleId' => 'arts-based-title', 'bg' => 'bg-purple', 'key' => 'arts_based', 'pb' => 'pb-4 md:pb-6',
        'entries' => <<<'HTML'
                        <li>Leavy, P. (Ed.). (2017). <em>Handbook of arts-based research.</em> Guilford Publications.</li>
                        <li>Leavy, P. (2020). <em>Method meets art: Arts-based research practice</em> (3rd ed.). The Guilford Press.</li>
                        <li>McDermott, T. L. (2024). <em>Arts-based inquiry as artist-teacher: Fostering reflective practice with pre-service art teachers through intermedia journaling</em> [Doctoral dissertation, The Ohio State University]. ProQuest Dissertations and Theses Global. <a href="https://www.proquest.com/docview/3112314726" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://www.proquest.com/docview/3112314726</a></li>
HTML,
    ],
    [
        'id' => 'ethnography', 'titleId' => 'ethnography-title', 'bg' => 'bg-green', 'key' => 'ethnography', 'pb' => 'pb-4 md:pb-6',
        'entries' => <<<'HTML'
                        <li>Boylorn, R. M., &amp; Orbe, M. P. (2014). <em>Critical autoethnography: Intersecting cultural identities in everyday life.</em> Left Coast Press. <a href="https://doi.org/10.4324/9781315431253" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.4324/9781315431253</a></li>
                        <li>Madison, D. S. (2005). <em>Critical ethnography: Method, ethics, and performance</em> (1st ed.). Sage. <a href="https://doi.org/10.4135/9781452233826" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.4135/9781452233826</a></li>
HTML,
    ],
    [
        'id' => 'analysis', 'titleId' => 'analysis-title', 'bg' => 'bg-black', 'key' => 'analysis', 'pb' => 'pb-4 md:pb-6',
        'entries' => <<<'HTML'
                        <li>Braun, V., &amp; Clarke, V. (2022a). <em>Thematic analysis: A practical guide</em>. Sage Publications.</li>
                        <li>Braun, V., &amp; Clarke, V. (2022b). Toward good practice in thematic analysis: Avoiding common problems and be(com)ing a knowing researcher. <em>International Journal of Transgender Health, 24</em>(1), 1-6. <a href="https://doi.org/10.1080/26895269.2022.2129597" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1080/26895269.2022.2129597</a></li>
HTML,
    ],
    [
        'id' => 'games', 'titleId' => 'games-title', 'bg' => 'bg-red', 'key' => 'games', 'pb' => 'pb-4 md:pb-6',
        'entries' => <<<'HTML'
                        <li>Carrión-Toro, M., Santorum, M., Acosta-Vargas, P., Aguilar, J., &amp; Pérez, M. (2020). iPlus a user-centered methodology for serious games design. <em>Applied Sciences, 10</em>(24), 9007. <a href="https://doi.org/10.3390/app10249007" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.3390/app10249007</a></li>
                        <li>Gobet, F., Voogt, A. J. d., &amp; Retschitzki, J. (2004). <em>Moves in mind: The psychology of board games</em>. Psychology Press. <a href="https://doi.org/10.4324/9780203503638" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.4324/9780203503638</a></li>
                        <li>Hamiye, F., Said, B., &amp; Serhan, B. (2019). A framework for the development of serious games for assessment. In G. N. Yannakakis, M. Ninaus, A. Liapis &amp; M. Gentile (Eds.), <em>Games and learning alliance</em> (pp. 407-416). Springer. <a href="https://doi.org/10.1007/978-3-030-34350-7_39" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1007/978-3-030-34350-7_39</a></li>
                        <li>Loh, C. S., Sheng, Y., &amp; Ifenthaler, D. (Eds.). (2015). <em>Serious games analytics: Methodologies for performance measurement, assessment, and improvement</em>. Springer. <a href="https://doi.org/10.1007/978-3-319-05834-4" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1007/978-3-319-05834-4</a></li>
                        <li>Macklin, C., &amp; Sharp, J. (2016). <em>Games, design and play: A detailed approach to iterative game design</em> (1st ed.). Pearson Education.</li>
                        <li>Monteiro-Krebs, L., Geerts, D., Sanders, K., Caregnato, S. E., &amp; Zaman, B. (2024). Board games as a research method: A case study on research game design and use in studying algorithmic mediation. In <em>Extended Abstracts of the 2024 CHI Conference on Human Factors in Computing Systems</em> (CHI EA '24). Association for Computing Machinery. <a href="https://doi.org/10.1145/3613905.3637116" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1145/3613905.3637116</a></li>
                        <li>Ritterfeld, U., Cody, M. J., &amp; Vorderer, P. (2009). <em>Serious games: Mechanisms and effects</em>. Routledge. <a href="https://doi.org/10.4324/9780203891650" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.4324/9780203891650</a></li>
                        <li>Tekinbaş, K. S., &amp; Zimmerman, E. (2003). <em>Rules of play: Game design fundamentals.</em> MIT Press.</li>
                        <li>Viudes-Carbonell, S. J., Gallego-Durán, F. J., Llorens-Largo, F., &amp; Molina-Carmona, R. (2021). Towards an iterative design for serious games. <em>Sustainability, 13</em>(6), 3290. <a href="https://doi.org/10.3390/su13063290" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.3390/su13063290</a></li>
HTML,
    ],
    [
        'id' => 'co-creation', 'titleId' => 'cocreation-title', 'bg' => 'bg-green', 'key' => 'co_creation', 'pb' => 'pb-4 md:pb-6',
        'entries' => <<<'HTML'
                        <li>Sanders, E. B.-N., &amp; Stappers, P. J. (2008). Co-creation and the new landscapes of design. <em>CoDesign, 4</em>(1), 5-18. <a href="https://doi.org/10.1080/15710880701875068" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.1080/15710880701875068</a></li>
HTML,
    ],
    [
        'id' => 'pedagogy', 'titleId' => 'pedagogy-title', 'bg' => 'bg-purple', 'key' => 'pedagogy', 'pb' => 'pb-16 md:pb-24',
        'entries' => <<<'HTML'
                        <li>Freire, P., Ramos, M. B., &amp; Macedo, D. P. (2000/2012). <em>Pedagogy of the oppressed</em> (30th anniversary ed.). Bloomsbury Academic.</li>
                        <li>Miller, C. A., Castaneda, D. I., &amp; Alemán, M. W. (2023). Pains and portends: A collaborative autoethnography of engineering faculty navigating gendered cultures. <em>Frontiers in Communication, 8.</em> <a href="https://doi.org/10.3389/fcomm.2023.1023594" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2 break-words">https://doi.org/10.3389/fcomm.2023.1023594</a></li>
HTML,
    ],
];
?>
<main>

    <!-- ===== Hero: typographic only ===== -->
    <section class="pt-24 md:pt-32 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <div class="flex items-center gap-2 mb-6 text-xs uppercase tracking-[0.25em] text-yellow-400/80">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" aria-hidden="true">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/>
                    </svg>
                    <span><?= te("$P.hero.eyebrow") ?></span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white tracking-tight leading-[1.05] mb-3 md:mb-4"><?= te("$P.hero.title") ?></h1>
                <p class="text-base md:text-lg italic font-light text-gray-300 mb-6 md:mb-8"><?= te("$P.hero.tagline") ?></p>
                <p class="text-base md:text-lg text-gray-400 leading-relaxed">
                    <?= te("$P.hero.lead") ?>
                </p>
                <p class="mt-6 text-sm md:text-base text-gray-400">
                    <a href="<?= esc(jw_page_url('/about.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.about") ?></a> &middot; <a href="<?= esc(jw_page_url('/design.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.design") ?></a> &middot; <a href="https://grsj.arts.ubc.ca/" target="_blank" rel="noopener noreferrer" class="text-yellow-400 hover:text-yellow-300 underline underline-offset-2"><?= te("$P.hero.links.grsj") ?></a>
                </p>
            </div>
        </div>
    </section>

<?php foreach ($sections as $i => $s): $c = "$P.sections.{$s['key']}"; ?>
    <!-- ===== <?= $i + 1 ?>. <?= esc($s['key']) ?> ===== -->
    <section id="<?= esc($s['id']) ?>" class="pt-12 md:pt-16 <?= $s['pb'] ?> border-t border-gray-700/40 scroll-mt-24" aria-labelledby="<?= esc($s['titleId']) ?>">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-8 md:gap-12 items-start">
                <header class="col-span-12 md:col-span-3 flex items-center gap-3">
                    <div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">
                        <img src="/img/design/<?= esc($s['bg']) ?>.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">
                    </div>
                    <span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none"><?= te("$c.stamp") ?></span>
                </header>
                <div class="col-span-12 md:col-span-8 md:col-start-5">
                    <h2 id="<?= esc($s['titleId']) ?>" class="text-2xl md:text-3xl font-medium text-white tracking-tight leading-tight mb-4"><?= te("$c.title") ?></h2>
                    <p class="text-gray-400 italic font-light text-base md:text-lg leading-relaxed mb-8"><?= te("$c.subtitle") ?></p>
                    <ul class="space-y-5 text-gray-300 text-[15px] md:text-base leading-relaxed">
<?= $s['entries'] ?>

                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php endforeach; ?>
    </main>
