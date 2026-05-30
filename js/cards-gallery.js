/*
 * © 2026 Adri M. Creative Commons Attribution-NonCommercial 4.0 International.
 *
 * Website card gallery. Fetches the deck data from the site's own /api/cards
 * path (nginx proxies it to the play backend, so it stays same-origin), then
 * builds the same face-down piles and deal-out animation the play gallery uses.
 */
(function () {
  var mount = document.getElementById('jw-gallery');
  var sub = document.getElementById('jw-sub');
  if (!mount) return;

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

  function buildCard(card, i, deck) {
    var isText = !card.image;
    var isBlack = deck.slug === 'countdown';
    var cls = 'jw-card' + (isText ? ' jw-card--text' : '') + (isBlack ? ' jw-card--black' : '');
    var art = el('article', { class: cls, style: '--i:' + i + ';--n:' + deck.cards.length + ';--suit:' + deck.color + ';' });
    art.appendChild(el('span', { class: 'jw-card-suit', 'aria-hidden': 'true' }));
    if (card.title) art.appendChild(el('h3', { class: 'jw-card-title', text: card.title }));
    if (card.image) {
      var wrap = el('div', { class: 'jw-card-art' });
      wrap.appendChild(el('img', { src: card.image, alt: 'Hand-drawn illustration for ' + (card.title || card.card_number), loading: 'lazy' }));
      art.appendChild(wrap);
    }
    var body = el('div', { class: 'jw-card-body' }, [el('p', { class: 'jw-card-text', text: card.content })]);
    if (card.author_name) body.appendChild(el('p', { class: 'jw-card-author', text: '- ' + card.author_name + ' -' }));
    art.appendChild(body);
    art.appendChild(el('span', { class: 'jw-card-id', text: card.card_number }));
    return art;
  }

  function render(data) {
    var decks = data.decks || [];
    if (sub) sub.textContent = data.total + ' cards across ' + decks.length + ' decks. Pick a deck to deal it out.';
    mount.textContent = '';

    var row = el('div', { class: 'jw-decks-row' });
    decks.forEach(function (deck) {
      var pile = el('button', {
        type: 'button', class: 'jw-pile', 'data-target': 'panel-' + deck.slug,
        'aria-controls': 'panel-' + deck.slug, 'aria-expanded': 'false',
        'aria-label': deck.type + ' deck, ' + deck.cards.length + ' cards',
        style: "--back:url('" + deck.back + "');--suit:" + deck.color + ';'
      }, [el('span', { class: 'jw-pile-count', text: String(deck.cards.length) })]);
      row.appendChild(el('div', { class: 'jw-deck-col' }, [pile, el('span', { class: 'jw-pile-label', text: deck.type })]));
    });
    mount.appendChild(row);

    decks.forEach(function (deck) {
      var head = el('div', { class: 'jw-panel-head' }, [
        el('span', { class: 'jw-deck-dot', style: 'background:' + deck.color + ';' }),
        el('span', { class: 'jw-panel-name', text: deck.type }),
        el('span', { class: 'jw-panel-meta', text: deck.letter + ' · ' + deck.cards.length }),
        el('button', { type: 'button', class: 'jw-panel-close', 'data-close': '', text: 'Close' })
      ]);
      var grid = el('div', { class: 'jw-cards-grid' });
      deck.cards.forEach(function (card, i) { grid.appendChild(buildCard(card, i, deck)); });
      mount.appendChild(el('section', { class: 'jw-panel', id: 'panel-' + deck.slug, 'data-effect': deck.effect, 'aria-hidden': 'true' }, [head, grid]));
    });

    wire();
  }

  function wire() {
    var piles = Array.prototype.slice.call(mount.querySelectorAll('.jw-pile'));
    var panels = Array.prototype.slice.call(mount.querySelectorAll('.jw-panel'));
    function closeAll() {
      panels.forEach(function (p) { p.classList.remove('is-open'); p.setAttribute('aria-hidden', 'true'); });
      piles.forEach(function (b) { b.classList.remove('is-active'); b.setAttribute('aria-expanded', 'false'); });
    }
    piles.forEach(function (pile) {
      pile.addEventListener('click', function () {
        var panel = document.getElementById(pile.getAttribute('data-target'));
        if (!panel) return;
        if (panel.classList.contains('is-open')) { closeAll(); return; }
        closeAll();
        void panel.offsetWidth;
        panel.classList.add('is-open');
        panel.setAttribute('aria-hidden', 'false');
        pile.classList.add('is-active');
        pile.setAttribute('aria-expanded', 'true');
        panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      });
    });
    panels.forEach(function (panel) {
      var close = panel.querySelector('[data-close]');
      if (close) close.addEventListener('click', function () {
        closeAll();
        var pile = mount.querySelector('.jw-pile[data-target="' + panel.id + '"]');
        if (pile) pile.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      });
    });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeAll(); });
  }

  // Ask the API for the page's language; it returns that locale (fr/es fall back
  // to en server-side). Driven by <html lang>.
  var lang = (document.documentElement.getAttribute('lang') || 'en').slice(0, 2);
  fetch('/api/cards?lng=' + encodeURIComponent(lang), { headers: { Accept: 'application/json' } })
    .then(function (r) { if (!r.ok) throw new Error('HTTP ' + r.status); return r.json(); })
    .then(render)
    .catch(function () {
      mount.textContent = '';
      mount.appendChild(el('p', { class: 'jw-hint', style: 'text-align:center;padding:3rem 0;', text: 'The decks could not be loaded right now. Please try again later.' }));
    });
})();
