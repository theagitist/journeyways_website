<?php
// Document head + opening body + nav. Reads globals set by index.php:
// $JW_LANG, $JW_PAGE, $JW_PATH, $JW_AVAIL, $JW_DICT.
$m       = "pages.$JW_PAGE.meta";
$canon   = JW_ORIGIN . jw_url($JW_PATH, $JW_LANG);
$ogImage = JW_ORIGIN . '/img/og-card.jpg';
?><!DOCTYPE html>
<html lang="<?= esc($JW_LANG) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= te("$m.description") ?>">
    <meta name="keywords" content="<?= te("$m.keywords") ?>">
    <meta name="author" content="Adri M. (theagitist) / UBC GRSJ">
    <meta name="robots" content="<?= esc(jw_opt("$m.robots", 'index, follow')) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= esc($canon) ?>">
    <meta property="og:title" content="<?= te("$m.og_title") ?>">
    <meta property="og:description" content="<?= te("$m.og_description") ?>">
    <meta property="og:image" content="<?= esc($ogImage) ?>">
    <meta property="og:site_name" content="JOURNEYWAYS">
    <meta property="og:locale" content="<?= esc($JW_LANG) ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= esc($canon) ?>">
    <meta name="twitter:title" content="<?= te("$m.og_title") ?>">
    <meta name="twitter:description" content="<?= te("$m.og_description") ?>">
    <meta name="twitter:image" content="<?= esc($ogImage) ?>">

    <!-- Canonical + language alternates -->
    <link rel="canonical" href="<?= esc($canon) ?>">
<?php foreach ($JW_AVAIL as $alt): ?>
    <link rel="alternate" hreflang="<?= esc($alt) ?>" href="<?= esc(JW_ORIGIN . jw_url($JW_PATH, $alt)) ?>">
<?php endforeach; ?>
    <link rel="alternate" hreflang="x-default" href="<?= esc(JW_ORIGIN . jw_url($JW_PATH, JW_DEFAULT_LANG)) ?>">

    <script type="application/ld+json">
    <?= json_encode([
        '@context'   => 'https://schema.org',
        '@type'      => 'WebSite',
        'name'       => 'JOURNEYWAYS',
        'url'        => $canon,
        'description'=> t("$m.description"),
        'inLanguage' => $JW_LANG,
        'author'     => [
            '@type' => 'Person',
            'name'  => 'Adri M.',
            'url'   => JW_ORIGIN . jw_url('/about.html', $JW_LANG),
            'affiliation' => [
                '@type' => 'EducationalOrganization',
                'name'  => 'UBC Institute for Gender, Race, Sexuality and Social Justice',
                'url'   => 'https://grsj.arts.ubc.ca/',
            ],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
    </script>

    <title><?= te("$m.title") ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon.png">
    <link rel="shortcut icon" href="/img/favicon.png">
    <link rel="preload" href="/fonts/inter-400-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/inter-600-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/italianno-400-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="/css/tailwind.css?v=25">
    <link rel="stylesheet" href="/css/styles.css?v=26">
</head>
<body class="bg-gray-800 text-white">
<?php require __DIR__ . '/nav.php'; ?>
