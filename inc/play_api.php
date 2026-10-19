<?php
// Card and tile text on the website comes from the play API, never from lang/*.json:
// play's locales are the single source, so both surfaces always read the same.
// Lang strings refer to it with tokens, filled at render time by t() and jw_load_js():
//   {{card:R22.title}}  {{card:R22.content}}  {{card:B26.author}}  {{tile:T5.name}}
// A token for a card or tile the API does not know renders as an empty string.

const JW_PLAY_API = 'http://127.0.0.1:1976/api/';
const JW_PLAY_TTL = 300; // seconds a fetched deck stays fresh in the file cache

// Fetch /api/{cards,tiles}?lng= once per request, cached on disk for JW_PLAY_TTL.
// ponytail: a stale cache is served when play is down; no cache and no play = empty tokens.
function jw_play_fetch(string $kind, string $lang): array {
    static $mem = [];
    $key = "$kind-$lang";
    if (isset($mem[$key])) return $mem[$key];
    $file = sys_get_temp_dir() . "/jw-play-$key.json";
    $fresh = is_file($file) && (time() - filemtime($file) < JW_PLAY_TTL);
    $body = $fresh ? file_get_contents($file) : false;
    if ($body === false) {
        $ctx = stream_context_create(['http' => ['timeout' => 2]]);
        $got = @file_get_contents(JW_PLAY_API . $kind . '?lng=' . rawurlencode($lang), false, $ctx);
        if ($got !== false && json_decode($got, true)) {
            $body = $got;
            @file_put_contents($file, $got, LOCK_EX);
        } elseif (is_file($file)) {
            $body = file_get_contents($file);
        }
    }
    return $mem[$key] = $body ? (json_decode($body, true) ?: []) : [];
}

// [type => [number => [field => text]]] for one language.
function jw_play_index(string $lang): array {
    static $idx = [];
    if (isset($idx[$lang])) return $idx[$lang];
    $out = ['card' => [], 'tile' => []];
    foreach ((jw_play_fetch('cards', $lang)['decks'] ?? []) as $deck) {
        foreach ($deck['cards'] ?? [] as $c) {
            $out['card'][$c['card_number']] = [
                'title' => $c['title'] ?? '', 'content' => $c['content'] ?? '',
                'author' => $c['author_name'] ?? '', 'deck' => $deck['type'] ?? '',
            ];
        }
    }
    foreach ((jw_play_fetch('tiles', $lang)['tiles'] ?? []) as $t) {
        $out['tile'][$t['tile_number']] = ['name' => $t['name'] ?? ''];
    }
    return $idx[$lang] = $out;
}

function jw_play_fill(string $s, ?string $lang = null): string {
    if (strpos($s, '{{') === false) return $s;
    global $JW_LANG;
    $idx = jw_play_index($lang ?? $JW_LANG ?? JW_DEFAULT_LANG);
    return preg_replace_callback('/\{\{(card|tile):([A-Z]\d+)\.(\w+)\}\}/', function ($m) use ($idx) {
        return $idx[$m[1]][$m[2]][$m[3]] ?? '';
    }, $s);
}

// Fill every string in a nested array (the JS dictionary injected as window.__I18N).
function jw_play_fill_all(array $a, string $lang): array {
    array_walk_recursive($a, function (&$v) use ($lang) { if (is_string($v)) $v = jw_play_fill($v, $lang); });
    return $a;
}
