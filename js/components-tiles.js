/*
 * © 2026 Adri M. Creative Commons Attribution-NonCommercial 4.0 International.
 *
 * Website tile gallery. Fetches the tile data from the site's own /api/tiles
 * path (nginx proxies it to the play backend, so it stays same-origin), builds
 * the square tile grid, and registers the tiles as a set on the SHARED site
 * lightbox (main.js: gallerySets + openLightboxFromSet) so a tap opens the same
 * boxed lightbox the rest of the site uses, with prev/next.
 *
 * Image sizes: the grid uses the small/medium variants via srcset; the lightbox
 * uses the medium (900px) variant, never the multi-MB master.
 */
(function () {
  var mount = document.getElementById('jw-tiles');
  var sub = document.getElementById('jw-tiles-sub');
  if (!mount) return;

  // Warm-paper square stand-in for the blank tile (it has no art).
  var BLANK_SRC = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='600'%3E%3Crect width='100%25' height='100%25' fill='%23fdfbf6'/%3E%3C/svg%3E";

  function el(tag, attrs, kids) {
    var n = document.createElement(tag);
    if (attrs) Object.keys(attrs).forEach(function (k) {
      if (k === 'style') n.style.cssText = attrs[k];
      else if (k === 'text') n.textContent = attrs[k];
      else n.setAttribute(k, attrs[k]);
    });
    (kids || []).forEach(function (c) { if (c) n.appendChild(c); });
    return n;
  }

  // Tiles render through THE single component renderer (window.JWComponents,
  // shared with the play app) so the website's tiles match the game's exactly.
  // The caption and lightbox wiring are this page's chrome.
  function nodeFromHTML(html) {
    var t = document.createElement('template');
    t.innerHTML = String(html).trim();
    return t.content.firstElementChild;
  }
  function buildTile(tile, i) {
    var btn = nodeFromHTML(window.JWComponents.tileFace({
      name: tile.name, number: tile.tile_number,
      isBlank: tile.blank || !tile.image, copies: tile.copies,
      image: tile.image || null
    }, { interactive: true, showCopies: true, blankText: 'Make your own' }));
    btn.addEventListener('click', function () { if (window.openLightboxFromSet) window.openLightboxFromSet('tiles', i); });
    var cap = el('figcaption', { class: 'jw-tile-cap' }, [el('span', { class: 'jw-tile-name', text: tile.name })]);
    return el('figure', { class: 'jw-tile-fig' }, [btn, cap]);
  }

  function render(data) {
    var tiles = data.tiles || [];
    if (sub) sub.textContent = tiles.length + ' map tiles. Their names are not printed on the board; pick a tile to see it up close.';

    // Register the lightbox set on the shared component. Use the medium (900px)
    // variant for the close-up, fast to load and crisp in the boxed lightbox.
    if (window.gallerySets) {
      window.gallerySets.tiles = tiles.map(function (t) {
        var src = (t.image && t.image.md) ? t.image.md : BLANK_SRC;
        var subt = t.tile_number + (t.copies > 0 ? '  ·  ' + t.copies + ' in the set' : '');
        return { src: src, alt: t.name + ' tile', title: t.name, subtitle: subt };
      });
    }

    mount.textContent = '';
    var grid = el('div', { class: 'jw-tiles-grid' });
    tiles.forEach(function (t, i) { grid.appendChild(buildTile(t, i)); });
    mount.appendChild(grid);
  }

  var lang = (document.documentElement.getAttribute('lang') || 'en').slice(0, 2);
  fetch('/api/tiles?lng=' + encodeURIComponent(lang), { headers: { Accept: 'application/json' } })
    .then(function (r) { if (!r.ok) throw new Error('HTTP ' + r.status); return r.json(); })
    .then(render)
    .catch(function () {
      mount.textContent = '';
      mount.appendChild(el('p', { class: 'jw-hint', style: 'text-align:center;padding:3rem 0;', text: 'The tiles could not be loaded right now. Please try again later.' }));
    });
})();
