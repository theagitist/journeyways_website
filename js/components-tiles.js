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

  function buildTile(tile, i) {
    var isBlank = tile.blank || !tile.image;
    var btn = el('button', { type: 'button', class: 'jw-tile' + (isBlank ? ' jw-tile--blank' : ''), 'aria-label': tile.name + ' tile' });
    if (isBlank) {
      btn.appendChild(el('span', { class: 'jw-tile-blank-text', text: 'Make your own' }));
      if (tile.copies > 0) btn.appendChild(el('span', { class: 'jw-tile-copies', title: 'copies in the set', text: '×' + tile.copies }));
    } else {
      btn.appendChild(el('img', {
        class: 'jw-tile-art', src: tile.image.sm,
        srcset: tile.image.sm + ' 400w, ' + tile.image.md + ' 900w',
        sizes: '(max-width: 640px) 45vw, 200px',
        alt: 'Hand-drawn ' + tile.name + ' tile', loading: 'lazy'
      }));
    }
    btn.appendChild(el('span', { class: 'jw-tile-id', text: tile.tile_number }));
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
