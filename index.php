<?php
// Front controller: resolve language + page from the URL, render head + template + footer.
require __DIR__ . '/inc/i18n.php';
$JW_PAGES = require __DIR__ . '/inc/pages.php';

[$JW_LANG, $path] = jw_resolve_lang($_SERVER['REQUEST_URI'] ?? '/');
if ($path === '/index.html') $path = '/';   // legacy home URL -> canonical

$page = $JW_PAGES[$path] ?? null;
$found = $page !== null && in_array($JW_LANG, $page['langs'], true);

if (!$found) {
    http_response_code(404);
    $JW_DICT = jw_load_dict($JW_LANG, '404');
    $JW_PATH = $path; $JW_PAGE = '404'; $JW_AVAIL = [JW_DEFAULT_LANG]; $JW_SUGGEST = null;
    ob_start(); require __DIR__ . '/404.php'; $CONTENT = ob_get_clean();
    require __DIR__ . '/partials/head.php';
    echo $CONTENT;
    require __DIR__ . '/partials/footer.php';
    return;
}

$JW_DICT = jw_load_dict($JW_LANG, $page['key']);

$JW_PATH    = $path;
$JW_PAGE    = $page['key'];
$JW_AVAIL   = $page['langs'];
$JW_SUGGEST = jw_suggested_lang($JW_LANG, $JW_AVAIL);

ob_start();
require __DIR__ . '/templates/' . $page['tpl'] . '.php';
$CONTENT = ob_get_clean();

require __DIR__ . '/partials/head.php';
echo $CONTENT;
require __DIR__ . '/partials/footer.php';
