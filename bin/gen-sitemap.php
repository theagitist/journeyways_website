<?php
// Regenerate sitemap.xml from the route registry. Run after changing inc/pages.php
// or adding pages: `php bin/gen-sitemap.php`. Registered multi-language routes get
// reciprocal xhtml:link hreflang alternates; not-yet-ported pages stay English-only.
require __DIR__ . '/../inc/i18n.php';
$registry = require __DIR__ . '/../inc/pages.php';

// Master page list: path => [priority, changefreq]. Not-in-registry paths are the
// English-only pages still served as static HTML until they are localized.
$pages = [
    '/'                        => ['1.0', 'monthly'],
    '/boardgame'          => ['0.9', 'monthly'],
    '/videogame'          => ['0.8', 'monthly'],
    '/updates'            => ['0.8', 'weekly'],
    '/photos'             => ['0.8', 'monthly'],
    '/about'              => ['0.7', 'monthly'],
    '/design'             => ['0.7', 'monthly'],
    '/components'         => ['0.7', 'monthly'],
    '/components-cards'   => ['0.6', 'monthly'],
    '/components-tiles'   => ['0.6', 'monthly'],
    '/components-manual'  => ['0.6', 'monthly'],
    '/components-quickref'     => ['0.6', 'monthly'],
    '/components-facilitator'  => ['0.6', 'monthly'],
    '/components-booklet' => ['0.6', 'monthly'],
    '/references'         => ['0.6', 'monthly'],
    '/presentation'       => ['0.5', 'monthly'],
];

$today = date('Y-m-d');
$out  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$out .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xhtml=\"http://www.w3.org/1999/xhtml\">\n";

foreach ($pages as $path => [$priority, $freq]) {
    $langs = $registry[$path]['langs'] ?? [JW_DEFAULT_LANG];
    foreach ($langs as $lang) {
        $out .= "  <url>\n";
        $out .= "    <loc>" . JW_ORIGIN . jw_url($path, $lang) . "</loc>\n";
        if (count($langs) > 1) {
            foreach ($langs as $alt) {
                $out .= "    <xhtml:link rel=\"alternate\" hreflang=\"$alt\" href=\"" . JW_ORIGIN . jw_url($path, $alt) . "\"/>\n";
            }
            $out .= "    <xhtml:link rel=\"alternate\" hreflang=\"x-default\" href=\"" . JW_ORIGIN . jw_url($path, JW_DEFAULT_LANG) . "\"/>\n";
        }
        $out .= "    <lastmod>$today</lastmod>\n";
        $out .= "    <changefreq>$freq</changefreq>\n";
        $out .= "    <priority>$priority</priority>\n";
        $out .= "  </url>\n";
    }
}
$out .= "</urlset>\n";

file_put_contents(__DIR__ . '/../sitemap.xml', $out);
echo "sitemap.xml written (" . substr_count($out, '<url>') . " urls)\n";
