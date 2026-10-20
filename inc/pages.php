<?php
// Route registry: clean English path => page template + languages it is published in.
// A language is only served (and only listed in hreflang/sitemap) once the page is
// fully translated for it. The card/tile galleries (components-cards, components-tiles)
// render their content from the play /api, which is language-aware; play's locale files
// carry the es/fr card + tile text, so those pages now publish in all languages too.
$all = ['en', 'es', 'fr'];
return [
    '/'                      => ['key' => 'index',              'tpl' => 'index',              'langs' => $all],
    '/boardgame'        => ['key' => 'boardgame',          'tpl' => 'boardgame',          'langs' => $all],
    '/about'            => ['key' => 'about',              'tpl' => 'about',              'langs' => $all],
    '/components'       => ['key' => 'components',         'tpl' => 'components',         'langs' => $all],
    '/components-manual' => ['key' => 'components-manual', 'tpl' => 'components-manual',  'langs' => $all],
    '/components-quickref' => ['key' => 'components-quickref', 'tpl' => 'components-quickref', 'langs' => $all],
    '/components-facilitator' => ['key' => 'components-facilitator', 'tpl' => 'components-facilitator', 'langs' => $all],
    '/components-booklet' => ['key' => 'components-booklet', 'tpl' => 'components-booklet', 'langs' => $all],
    '/components-cards' => ['key' => 'components-cards',   'tpl' => 'components-cards',   'langs' => $all],
    '/components-tiles' => ['key' => 'components-tiles',   'tpl' => 'components-tiles',   'langs' => $all],
    '/videogame'        => ['key' => 'videogame',         'tpl' => 'videogame',          'langs' => $all],
    '/design'           => ['key' => 'design',            'tpl' => 'design',             'langs' => $all],
    '/updates'          => ['key' => 'updates',           'tpl' => 'updates',            'langs' => $all],
    '/references'       => ['key' => 'references',         'tpl' => 'references',         'langs' => $all],
    '/photos'           => ['key' => 'photos',            'tpl' => 'photos',             'langs' => $all],
    '/contact'          => ['key' => 'contact',           'tpl' => 'contact',            'langs' => $all],
];
