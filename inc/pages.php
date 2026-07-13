<?php
// Route registry: clean English path => page template + languages it is published in.
// A language is only served (and only listed in hreflang/sitemap) once the page is
// fully translated for it. The card/tile galleries (components-cards, components-tiles)
// render their content from the play /api, which is language-aware; play's locale files
// carry the es/fr card + tile text, so those pages now publish in all languages too.
$all = ['en', 'es', 'fr'];
return [
    '/'                      => ['key' => 'index',              'tpl' => 'index',              'langs' => $all],
    '/boardgame.html'        => ['key' => 'boardgame',          'tpl' => 'boardgame',          'langs' => $all],
    '/about.html'            => ['key' => 'about',              'tpl' => 'about',              'langs' => $all],
    '/components.html'       => ['key' => 'components',         'tpl' => 'components',         'langs' => $all],
    '/components-manual.html' => ['key' => 'components-manual', 'tpl' => 'components-manual',  'langs' => $all],
    '/components-booklet.html' => ['key' => 'components-booklet', 'tpl' => 'components-booklet', 'langs' => $all],
    '/components-cards.html' => ['key' => 'components-cards',   'tpl' => 'components-cards',   'langs' => $all],
    '/components-tiles.html' => ['key' => 'components-tiles',   'tpl' => 'components-tiles',   'langs' => $all],
    '/videogame.html'        => ['key' => 'videogame',         'tpl' => 'videogame',          'langs' => $all],
    '/design.html'           => ['key' => 'design',            'tpl' => 'design',             'langs' => $all],
    '/updates.html'          => ['key' => 'updates',           'tpl' => 'updates',            'langs' => $all],
    '/references.html'       => ['key' => 'references',         'tpl' => 'references',         'langs' => $all],
    '/photos.html'           => ['key' => 'photos',            'tpl' => 'photos',             'langs' => $all],
    '/contact.html'          => ['key' => 'contact',           'tpl' => 'contact',            'langs' => $all],
];
