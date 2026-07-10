<?php
// Primary navigation + language switcher + (optional) language suggestion banner.
// Uses globals: $JW_LANG, $JW_PATH, $JW_AVAIL, $JW_SUGGEST.
$navItems = [
    ['/',               'common.nav.homepage',  'common.nav.aria.homepage'],
    ['/boardgame.html', 'common.nav.boardgame', 'common.nav.aria.boardgame'],
    ['/videogame.html', 'common.nav.videogame', 'common.nav.aria.videogame'],
    ['/updates.html',   'common.nav.updates',   'common.nav.aria.updates'],
    ['/design.html',    'common.nav.design',    'common.nav.aria.design'],
    ['/components.html', 'common.nav.components', 'common.nav.aria.components'],
    ['/photos.html',    'common.nav.photos',    'common.nav.aria.photos'],
    ['/about.html',     'common.nav.about',     'common.nav.aria.about'],
];
$active = 'font-bold text-yellow-400';
$idle   = 'hover:text-yellow-400 transition-colors';
?>
<?php if ($JW_SUGGEST && empty($_COOKIE['jw_no_lang_hint'])):
    $sd = jw_load_dict($JW_SUGGEST); ?>
<div id="lang-hint" class="fixed top-0 w-full bg-yellow-400 text-black text-sm px-4 py-2" style="z-index:60">
    <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
        <span><?= esc($sd['common']['banner']['text'] ?? '') ?></span>
        <span class="flex items-center gap-4 shrink-0">
            <a href="<?= esc(jw_url($JW_PATH, $JW_SUGGEST)) ?>" class="font-semibold underline underline-offset-2"><?= esc($sd['common']['banner']['cta'] ?? '') ?></a>
            <button type="button" id="lang-hint-dismiss" aria-label="<?= esc($sd['common']['banner']['dismiss'] ?? 'Dismiss') ?>" class="font-bold px-1">&times;</button>
        </span>
    </div>
</div>
<script>
document.getElementById('lang-hint-dismiss')?.addEventListener('click', function () {
    document.cookie = 'jw_no_lang_hint=1; path=/; max-age=31536000; samesite=lax';
    document.getElementById('lang-hint')?.remove();
});
</script>
<?php endif; ?>
<nav class="fixed top-0 w-full bg-black bg-opacity-50 backdrop-blur-sm z-50" aria-label="Main navigation">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-3">
            <div class="flex items-center space-x-8">
                <a href="<?= esc(jw_page_url('/', $JW_LANG)) ?>" class="<?= $JW_PATH === '/' ? $active : $idle ?>" aria-label="<?= te('common.nav.aria.homepage') ?>"><?= te('common.nav.homepage') ?></a>
                <div class="hidden md:flex space-x-6 items-center">
<?php foreach (array_slice($navItems, 1) as [$href, $label, $aria]): ?>
                    <a href="<?= esc(jw_page_url($href, $JW_LANG)) ?>" class="<?= $JW_PATH === $href ? $active : $idle ?>" aria-label="<?= te($aria) ?>"><?= te($label) ?></a>
<?php endforeach; ?>
                    <span class="text-gray-600" aria-hidden="true">|</span>
<?php foreach ($JW_AVAIL as $l): ?>
                    <a href="<?= esc(jw_url($JW_PATH, $l)) ?>" hreflang="<?= esc($l) ?>" class="text-xs uppercase tracking-wider <?= $l === $JW_LANG ? 'text-yellow-400 font-bold' : 'text-gray-400 hover:text-yellow-400 transition-colors' ?>"><?= esc($l) ?></a>
<?php endforeach; ?>
                </div>
            </div>
            <button id="mobile-menu-button" class="md:hidden text-yellow-400 hover:text-yellow-300 focus:outline-none" aria-label="Open or close main menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden pb-4" role="navigation" aria-label="Main menu">
            <div class="flex flex-col space-y-3">
<?php foreach ($navItems as [$href, $label, $aria]): ?>
                <a href="<?= esc(jw_page_url($href, $JW_LANG)) ?>" class="<?= ($JW_PATH === $href ? $active : $idle) ?> py-2" aria-label="<?= te($aria) ?>"><?= te($label) ?></a>
<?php endforeach; ?>
                <div class="flex gap-4 pt-2 border-t border-gray-700/40">
<?php foreach ($JW_AVAIL as $l): ?>
                    <a href="<?= esc(jw_url($JW_PATH, $l)) ?>" hreflang="<?= esc($l) ?>" class="text-xs uppercase tracking-wider <?= $l === $JW_LANG ? 'text-yellow-400 font-bold' : 'text-gray-400' ?>"><?= esc($l) ?></a>
<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</nav>
