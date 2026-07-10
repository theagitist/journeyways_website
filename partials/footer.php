    <footer class="bg-black py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p class="text-sm text-gray-500 mb-2">
                <?= t('common.footer.research_by') ?> <a href="<?= esc(jw_page_url('/about.html', $JW_LANG)) ?>" class="hover:text-yellow-400 transition-colors">Adri M.</a> <?= t('common.footer.at_institute') ?> <a href="<?= esc(jw_page_url('/references.html', $JW_LANG)) ?>" class="text-yellow-400 hover:text-yellow-300 transition-colors"><?= te('common.footer.references') ?></a>.
            </p>
            <p class="text-gray-400">JOURNEYWAYS. <?= te('common.footer.tagline') ?><span class="text-xs text-gray-600 ml-2">v1.4.1</span></p>
        </div>
    </footer>

    <div id="cookie-banner" class="cookie-banner">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex-1">
                <p class="text-white text-sm md:text-base"><?= te('common.cookie.text') ?></p>
            </div>
            <button id="accept-cookies" class="bg-yellow-400 text-black px-5 py-2 rounded hover:bg-yellow-300 transition-colors font-medium whitespace-nowrap"><?= te('common.cookie.accept') ?></button>
        </div>
    </div>

    <script>window.__I18N = <?= json_encode(jw_load_js($JW_LANG), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;</script>
    <script src="/js/main.js?v=23" defer></script>
    <script defer src="https://www.googletagmanager.com/gtag/js?id=G-3W5YQCJ0FQ"></script>
</body>
</html>
