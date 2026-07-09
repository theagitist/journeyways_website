/**
 * JOURNEYWAYS – global and page-specific scripts
 * Shared across index.html, videogame.html, photos.html
 */

// --- Redirect (run first) ---
// Only canonicalize within HTTPS production (apex -> www). Skip file://, http://localhost,
// and any other dev protocol so local Playwright/file inspection works without bouncing
// to the live site.
(function () {
    if (window.location.protocol === 'https:' && window.location.hostname !== 'www.journeyways.ca') {
        window.location.replace(
            'https://www.journeyways.ca' + window.location.pathname + window.location.search + window.location.hash
        );
    }
})();

// --- Google Analytics (must be available before cookie consent may fire) ---
window.dataLayer = window.dataLayer || [];
function gtag() {
    window.dataLayer.push(arguments);
}
if (localStorage.getItem('cookieConsent') === 'accepted') {
    gtag('js', new Date());
    gtag('config', 'G-3W5YQCJ0FQ');
}

// --- Page detection ---
function getPageId() {
    var path = window.location.pathname || '';
    if (path === '/' || path === '/index.html' || path.endsWith('/')) return 'index';
    if (path.indexOf('videogame') !== -1) return 'videogame';
    if (path.indexOf('photos') !== -1) return 'photos';
    if (path.indexOf('contact') !== -1) return 'contact';
    if (path.indexOf('about') !== -1) return 'about';
    return 'index';
}

// --- Contact page: form submission ---
// Same-origin endpoint; nginx proxies /api/* to the local backend (server/index.js).
var CONTACT_ENDPOINT = '/api/contact';

function initContactForm() {
    var form = document.getElementById('contact-form');
    if (!form) return;
    var submitBtn = document.getElementById('contact-submit');
    var status = document.getElementById('contact-status');

    function setStatus(text, color) {
        status.textContent = text;
        status.style.color = color || '';
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (!form.checkValidity()) {
            setStatus('Please fill the required fields.', '#f87171');
            return;
        }

        var fd = new FormData(form);
        var interests = fd.getAll('interest');
        // Cloudflare Turnstile injects this hidden input on success.
        var turnstileToken = (fd.get('cf-turnstile-response') || '').toString();
        var payload = {
            name: (fd.get('name') || '').toString().trim(),
            email: (fd.get('email') || '').toString().trim(),
            interests: interests,
            message: (fd.get('message') || '').toString().trim(),
            website: (fd.get('website') || '').toString(), // honeypot
            turnstileToken: turnstileToken
        };

        submitBtn.disabled = true;
        setStatus('Sending...', '');

        fetch(CONTACT_ENDPOINT, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        }).then(function (res) {
            return res.json().then(function (body) { return { ok: res.ok, body: body }; });
        }).then(function (result) {
            if (result.ok) {
                form.reset();
                if (typeof window.turnstile !== 'undefined' && typeof window.turnstile.reset === 'function') {
                    window.turnstile.reset();
                }
                setStatus('Message sent. Thank you for reaching out.', '#86efac');
            } else {
                var msg = (result.body && result.body.error) || 'Something went wrong. Please try again later.';
                setStatus(msg, '#f87171');
            }
        }).catch(function () {
            setStatus('Network error. Please try again later.', '#f87171');
        }).then(function () {
            submitBtn.disabled = false;
        });
    });
}

// --- Mobile menu (all pages with nav) ---
function initMobileMenu() {
    var mobileMenuButton = document.getElementById('mobile-menu-button');
    var mobileMenu = document.getElementById('mobile-menu');
    var menuIcon = document.getElementById('menu-icon');
    var closeIcon = document.getElementById('close-icon');
    if (!mobileMenuButton || !mobileMenu || !menuIcon || !closeIcon) return;

    mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    var links = mobileMenu.querySelectorAll('a');
    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function () {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        });
    }
}

// --- Cookie consent banner ---
function initCookieBanner() {
    var cookieBanner = document.getElementById('cookie-banner');
    var acceptCookiesBtn = document.getElementById('accept-cookies');
    if (!cookieBanner || !acceptCookiesBtn) return;

    if (!localStorage.getItem('cookieConsent')) {
        setTimeout(function () {
            cookieBanner.classList.add('show');
        }, 1000);
    }

    acceptCookiesBtn.addEventListener('click', function () {
        localStorage.setItem('cookieConsent', 'accepted');
        cookieBanner.classList.remove('show');
        setTimeout(function () {
            cookieBanner.style.display = 'none';
        }, 300);
        if (typeof gtag !== 'undefined') {
            gtag('js', new Date());
            gtag('config', 'G-3W5YQCJ0FQ');
        }
    });
}

// --- CTA injection by page (Ready to Begin) ---
function injectCTA() {
    var container = document.getElementById('cta-container');
    if (!container) return;

    var path = window.location.pathname || '';
    var isVideogame = path.indexOf('videogame') !== -1;
    var isIndex = path === '/' || path === '/index.html' || path.endsWith('/');
    var isPhotos = path.indexOf('photos') !== -1;

    if (isPhotos) return;

    if (isVideogame) {
        container.innerHTML =
            '<section class="py-12 bg-amber-400 text-black">' +
            '<div class="max-w-4xl mx-auto text-center px-4">' +
            '<h2 class="text-2xl md:text-3xl font-semibold mb-3">Ready to Begin?</h2>' +
            '<p class="text-base md:text-lg mb-6 max-w-2xl mx-auto">Step into the digital version of Journeyways. Explore identity, agency, and community in a transformative interactive space.</p>' +
            '<a href="https://play.journeyways.ca" class="inline-block bg-black text-white px-6 py-2.5 rounded font-medium hover:bg-gray-800 transition-colors">Play the Digital Version</a>' +
            '</div></section>';
    } else if (isIndex) {
        container.innerHTML =
            '<section class="pt-8 md:pt-12 pb-20 md:pb-24 border-t border-gray-700/40">' +
            '<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">' +
            '<div class="grid grid-cols-12 gap-8 md:gap-12 items-start">' +
            '<header class="col-span-12 md:col-span-3 flex items-center gap-3">' +
            '<div class="w-9 h-12 md:w-10 md:h-14 overflow-hidden opacity-80 shrink-0">' +
            '<img src="img/design/bg-purple.webp" alt="" class="w-full h-full object-cover" loading="lazy" aria-hidden="true">' +
            '</div>' +
            '<span class="script-font text-4xl md:text-5xl text-yellow-400 leading-none">Begin</span>' +
            '</header>' +
            '<div class="col-span-12 md:col-span-8 md:col-start-5">' +
            '<h2 class="text-xl md:text-2xl text-gray-100 font-light leading-[1.3] tracking-tight mb-8 max-w-prose">Step into the game and let the journey unfold.</h2>' +
            '<a href="boardgame.html" class="inline-flex items-center gap-2 border border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black px-7 py-3 transition-colors text-sm tracking-[0.2em] uppercase">' +
            '<span>How to play</span>' +
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>' +
            '</a>' +
            '</div></div></div></section>';
    }
}

// --- Photos: smooth scroll for in-page anchors ---
function initSmoothScroll() {
    var anchors = document.querySelectorAll('a[href^="#"]');
    for (var i = 0; i < anchors.length; i++) {
        (function (anchor) {
            anchor.addEventListener('click', function (e) {
                var href = anchor.getAttribute('href');
                if (href === '#') return;
                var target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        })(anchors[i]);
    }
}

// --- Lightbox: supports multiple "sets" of images. Pages call
// openLightboxFromSet(setName, index) for set-bounded navigation, or
// openLightbox(index) as a back-compat alias for the photos set. ---
var gallerySets = {
    photos: [
        { src: 'img/boardgame_setup.webp', alt: 'JOURNEYWAYS board game setup - Full view of initial board configuration with game tiles and components ready for identity exploration gameplay', title: 'Board Game Setup', subtitle: 'Initial board configuration.' },
        { src: 'img/boardgame_components.webp', alt: 'JOURNEYWAYS board game components - Detailed view of all game pieces including cards, tiles, player tokens, and booklets for collaborative storytelling', title: 'Board Game Components', subtitle: 'Pieces that bring the game to life.' },
        { src: 'img/players_in_action.webp', alt: 'JOURNEYWAYS players in action - People engaged in playing the identity exploration board game, demonstrating collaborative storytelling and meaningful gameplay', title: 'Players in Action', subtitle: 'Connecting over gameplay.' },
        { src: 'img/edges_playtest_journaling.webp', alt: 'JOURNEYWAYS playtest with the EDGES research group at UBC - participants picking cards, writing journal entries, and reflecting in collaborative play', title: 'Journaling in Play', subtitle: 'EDGES playtest, UBC. November 2025.' },
        { src: 'img/edges_playtest_table.webp', alt: 'JOURNEYWAYS playtest table view - EDGES research group at UBC playing collaboratively, with cards, tiles, and journals spread across the table', title: 'Around the Table', subtitle: 'EDGES playtest, UBC. November 2025.' },
        { src: 'img/edges_playtest_board.webp', alt: 'JOURNEYWAYS board state mid-session - top-down view of game tiles forming a path, character cards arrayed, and journal pages open from the EDGES playtest at UBC', title: 'Board State Mid-Session', subtitle: 'EDGES playtest, UBC. November 2025.' },
        { src: 'img/protoconbc_table.webp', alt: 'JOURNEYWAYS at ProtoConBC: a table with the JOURNEYWAYS Game Rules sheet, player booklets, character cards, and a ProtoConBC #18 placard.', title: 'On the Table', subtitle: 'ProtoConBC, Vancouver. October 2025.' },
        { src: 'img/protoconbc_hall.webp', alt: 'Wide view of the ProtoConBC convention hall, with players writing at long tables and the LOOKING FOR PLAYERS sign visible.', title: 'In the Hall', subtitle: 'ProtoConBC, Vancouver. October 2025.' },
        { src: 'img/protoconbc_pair.webp', alt: 'Two players writing in their booklets at a JOURNEYWAYS table during ProtoConBC, the watercolor map tiles spread between them.', title: 'Two Players', subtitle: 'ProtoConBC, Vancouver. October 2025.' },
        { src: 'img/protoconbc_session.webp', alt: 'A wider angle of a JOURNEYWAYS session at ProtoConBC: several players writing simultaneously, with cards, tiles, and journals filling the table.', title: 'Mid-Session', subtitle: 'ProtoConBC, Vancouver. October 2025.' }
    ],
    boardgameSetup: [
        { src: 'img/boardgame_setup.webp', alt: 'JOURNEYWAYS setup ready to begin: tiles, character cards, meeples, character booklets.', title: 'Game Setup', subtitle: 'Tiles, cards, tokens.' }
    ],
    boardgameTiles: [
        { src: 'img/design/tile-mirror-lake.webp', alt: 'Map tile: Mirror Lake. Hand-drawn lake silhouette over watercolor splotches.', title: 'Mirror Lake', subtitle: 'Map tile.' },
        { src: 'img/design/tile-star-bridge.webp', alt: 'Map tile: Star Bridge. Hand-drawn arched bridge silhouette over watercolor splotches.', title: 'Star Bridge', subtitle: 'Map tile.' },
        { src: 'img/design/tile-singing-cave.webp', alt: 'Map tile: Singing Cave. Hand-drawn cave silhouette over watercolor splotches.', title: 'Singing Cave', subtitle: 'Map tile.' },
        { src: 'img/design/tile-mountain-peak.webp', alt: 'Map tile: Mountain Peak. Hand-drawn mountain silhouette in deep blues with ink splatters.', title: 'Mountain Peak', subtitle: 'Map tile.' },
        { src: 'img/design/tile-childhood-house.webp', alt: 'Map tile: Childhood House. A small house surrounded by colorful watercolor splatters.', title: 'Childhood House', subtitle: 'Map tile.' },
        { src: 'img/design/tile-study-room.webp', alt: 'Map tile: Study Room. Hand-drawn room silhouette over watercolor splotches.', title: 'Study Room', subtitle: 'Map tile.' },
        { src: 'img/design/tile-volcanic-ground.webp', alt: 'Map tile: Volcanic Ground. A volcano erupting in fiery red, orange and black ink splatters.', title: 'Volcanic Ground', subtitle: 'Map tile.' },
        { src: 'img/design/tile-tree-hollow.webp', alt: 'Map tile: Tree Hollow. A bare tree with deep blue and violet splatters across its branches.', title: 'Tree Hollow', subtitle: 'Map tile.' },
        { src: 'img/design/tile-buried-names-field.webp', alt: 'Map tile: Buried Names Field. A line drawing of a cracked, fissured field with two small saplings.', title: 'Buried Names Field', subtitle: 'Map tile.' },
        { src: 'img/design/tile-misty-trail.webp', alt: 'Map tile: Misty Trail. Hand-drawn bare trees flanking a quiet path between two hillsides.', title: 'Misty Trail', subtitle: 'Map tile.' },
        { src: 'img/design/tile-night-way.webp', alt: 'Map tile: Night Way. Hand-drawn dark path under a starless sky.', title: 'Night Way', subtitle: 'Map tile.' },
        { src: 'img/design/tile-abandoned-playground.webp', alt: 'Map tile: Abandoned Playground. A playground structure with slide and ladder, with multicolor paint splatters.', title: 'Abandoned Playground', subtitle: 'Map tile.' }
    ],
    boardgameCardFronts: [
        { src: 'img/design/card-box-not-yet.webp', alt: "Encounter card front: a watercolor and ink illustration of a box labeled 'Not yet'.", title: 'Encounter (Red)', subtitle: '"You find a box labeled ‘Not yet’. Do you grab it? Do you open it?"' },
        { src: 'img/design/card-reminiscence.webp', alt: 'Movement card front: a watercolor and ink illustration evoking a return to a familiar place.', title: 'Movement (Green)', subtitle: '"Go to a space you have already been to."' },
        { src: 'img/design/card-encounter.webp', alt: 'Group action card front: a watercolor and ink illustration of two figures meeting.', title: 'Group action (Purple)', subtitle: '"You stumble upon another player. Share one element of your stories."' },
        { src: 'img/design/card-mirror.webp', alt: 'Encounter card front: a watercolor and ink illustration of a cracked mirror.', title: 'Encounter (Red)', subtitle: '"A mirror cracks as you pass."' },
        { src: 'img/design/card-commune.webp', alt: 'Group action card front: a watercolor of six colorful meeples huddled together.', title: 'Group action (Purple)', subtitle: '"Everyone shares one key element of their story."' },
        { src: 'img/design/card-map.webp', alt: 'Encounter card front: a watercolor and ink illustration of a map without directions.', title: 'Encounter (Red)', subtitle: '"You receive a map with no directions. What do you do?"' },
        { src: 'img/design/card-memory.webp', alt: 'Encounter card front: a watercolor and ink illustration of a memory growing wild.', title: 'Encounter (Red)', subtitle: '"A memory rises, vivid and uninvited. What does it ask of you?"' },
        { src: 'img/design/card-echo.webp', alt: 'Encounter card front: a watercolor and ink illustration of two splotchy figures facing each other.', title: 'Encounter (Red)', subtitle: '"An echo answers back. Whose voice is it?"' },
        { src: 'img/design/card-wind.webp', alt: 'Encounter card front: a watercolor and ink illustration of a figure with thoughts scattering on the wind.', title: 'Encounter (Red)', subtitle: '"A wind scatters your thoughts. Do you gather them back? How are they different now?"' }
    ],
    videogameCards: [
        { src: 'img/design/card-wind.webp', alt: 'Encounter card front: watercolor and ink of a figure with thoughts scattering on the wind.', title: 'Wind', subtitle: '"A wind scatters your thoughts. Do you gather them back? How are they different now?"' },
        { src: 'img/design/card-commune.webp', alt: 'Group action card front: watercolor of six colourful meeples huddled together.', title: 'Commune', subtitle: '"Everyone shares one key element of their story and reflects on what they mean to their own."' }
    ],
    videogameTiles: [
        { src: 'img/design/tile-misty-trail.webp', alt: 'Map tile: Misty Trail. Hand-drawn bare trees flanking a quiet path between two hillsides.', title: 'Misty Trail', subtitle: 'Map tile.' },
        { src: 'img/design/tile-night-way.webp', alt: 'Map tile: Night Way. Hand-drawn dark path under a starless sky.', title: 'Night Way', subtitle: 'Map tile.' }
    ],
    boardgameCardBacks: [
        { src: 'img/design/bg-red.webp', alt: 'Card back in red, yellow and orange watercolor splotches.', title: 'Red | Encounters', subtitle: 'Card back.' },
        { src: 'img/design/bg-green.webp', alt: 'Card back in shades of green watercolor splotches.', title: 'Green | Movement', subtitle: 'Card back.' },
        { src: 'img/design/bg-blue.webp', alt: 'Card back in shades of blue watercolor splotches.', title: 'Blue | Reflections', subtitle: 'Card back.' },
        { src: 'img/design/bg-black.webp', alt: 'Card back in shades of black and gray watercolor splotches.', title: 'Black | Countdown', subtitle: 'Card back.' },
        { src: 'img/design/bg-purple.webp', alt: 'Card back in shades of purple watercolor splotches.', title: 'Purple | Group actions', subtitle: 'Card back.' }
    ],
    homeComponents: [
        { src: 'img/boardgame_components.webp', alt: 'JOURNEYWAYS board game components and setup for collaborative identity exploration: tiles, cards, tokens, and player booklets arranged for play.', title: 'Game components', subtitle: 'Tiles, cards, tokens, and player booklets, arranged for a session.' }
    ],
    videogameScreens: [
        { src: 'img/play/play-home.webp', alt: 'The JOURNEYWAYS digital game home screen: the watercolour wordmark over a puzzle-piece landscape, with Begin the Journey and Return to Path buttons.', title: 'The front door', subtitle: 'JOURNEYWAYS online: a game about becoming.' },
        { src: 'img/play/play-dashboard.webp', alt: 'The digital game dashboard: a Welcome back greeting, the five suit dots, and Active Journeys, Join a Journey, and Start a New Journey tabs over cards for the player’s rooms.', title: 'Your dashboard', subtitle: 'Your rooms and journeys, gathered in one place.' },
        { src: 'img/play/play-tiles.webp', alt: 'The digital map-tile gallery: a grid of square watercolour tiles, each with its name below, including Start, Mirror Lake, Mountain Peak, and Star Bridge.', title: 'The map tiles', subtitle: 'The modular map, including blank tiles to fill in yourself.' },
        { src: 'img/play/play-room.webp', alt: 'Inside a room: the private journal panel with the Character Origins prompts on the left, beside the room lobby with its members and a Start Journey button on the right.', title: 'Inside a room', subtitle: 'The private journal beside the live room lobby.' }
    ],
    manual: [
        { src: 'img/manual/p01.webp?v=2', alt: 'The Game Manual cover: JOURNEYWAYS Game Rules, a board game about becoming, over a watercolour landscape.', title: 'Cover', subtitle: 'The Game Manual.' },
        { src: 'img/manual/p04.webp?v=2', alt: 'The Game Setup page: what you will need and how to lay out the tiles and the five card piles, with a hand-drawn side note.', title: 'Game Setup', subtitle: 'Laying out the game.' },
        { src: 'img/manual/p05.webp?v=2', alt: 'The Basic Gameplay page: the three phases of a turn and a legend of the five card colours.', title: 'Basic Gameplay', subtitle: 'Explore, pick, reflect.' },
        { src: 'img/manual/p08.webp?v=2', alt: 'A sample journal entry in a handwritten script, with a small painted volcano in the corner.', title: 'A journal entry', subtitle: 'An example of writing from the cards.' },
        { src: 'img/manual/p09.webp?v=2', alt: 'The Solo and Group Play page, with a photograph of painted meeples.', title: 'Solo and Group Play', subtitle: 'Playing alone or together.' },
        { src: 'img/manual/p13.webp?v=2', alt: 'The manual back cover: the Journeyways mark, a QR code, and the tagline a game about becoming.', title: 'Back cover', subtitle: 'A game about becoming.' }
    ],
    booklet: [
        { src: 'img/booklet/p01.webp?v=2', alt: 'The Player Booklet cover: the Journeyways mark over a soft monochrome landscape, titled Player Booklet.', title: 'Cover', subtitle: 'The Player Booklet.' },
        { src: 'img/booklet/p02.webp?v=2', alt: 'The intro and Quick Reference page: the three phases of a turn, the card colours, and things good to know.', title: 'Quick Reference', subtitle: 'The turn and the card colours at a glance.' },
        { src: 'img/booklet/p03.webp?v=2', alt: 'The first Character Sheet: prompts for where you come from, where you are now, what and who you are, why, your name, and your goal.', title: 'Character Sheet', subtitle: 'Who you are at the start.' },
        { src: 'img/booklet/p06.webp?v=2', alt: 'A lined journal page with the Journeyways mark, for writing and drawing your story as it unfolds.', title: 'Journal Page', subtitle: 'Lined pages to write and draw your story.' },
        { src: 'img/booklet/p15.webp?v=2', alt: 'The second Character Sheet: prompts for who you are now, what changed, your name, your story title, and reflections.', title: 'Character Sheet', subtitle: 'Who you have become.' },
        { src: 'img/booklet/p16.webp?v=2', alt: 'The booklet back cover: the Journeyways mark, a QR code, and the tagline a board game about becoming.', title: 'Back cover', subtitle: 'A game about becoming.' }
    ]
};
var currentSet = 'photos';
var currentImageIndex = 0;

// The lightbox is ONE component, built here and injected once, reused by every
// page (photos, components, boardgame, etc.). Items are either images
// ({src, alt, title, subtitle}) or a DOM node ({node: fn|Element}) for rich
// content like a full card. Pages only register gallerySets and call
// openLightboxFromSet; no page duplicates the markup or styling.
function buildLightboxDOM() {
    if (document.getElementById('lightbox')) return;
    var lb = document.createElement('div');
    lb.id = 'lightbox';
    lb.className = 'lightbox';
    lb.innerHTML =
        '<div class="lightbox-box">' +
            '<button class="lightbox-close" type="button" aria-label="Close">&times;</button>' +
            '<button class="lightbox-nav lightbox-prev" type="button" aria-label="Previous">&#10094;</button>' +
            '<button class="lightbox-nav lightbox-next" type="button" aria-label="Next">&#10095;</button>' +
            '<div class="lightbox-stage" id="lightbox-stage"><img class="lightbox-content" id="lightbox-img" src="" alt=""></div>' +
            '<div class="lightbox-caption"><h3 id="lightbox-title"></h3><p id="lightbox-subtitle"></p></div>' +
        '</div>';
    document.body.appendChild(lb);
    lb.addEventListener('click', function (e) { if (e.target === lb) closeLightbox(); });
    lb.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
    lb.querySelector('.lightbox-prev').addEventListener('click', function () { navigateLightbox(-1); });
    lb.querySelector('.lightbox-next').addEventListener('click', function () { navigateLightbox(1); });
}

function openLightbox(index) {
    return openLightboxFromSet('photos', index);
}

function openLightboxFromSet(setName, index) {
    if (!gallerySets[setName]) return;
    currentSet = setName;
    currentImageIndex = index;
    var lightbox = document.getElementById('lightbox');
    if (!lightbox) return;
    if (gallerySets[setName].length <= 1) lightbox.classList.add('single-image');
    else lightbox.classList.remove('single-image');
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
    updateLightbox();
}

function updateLightbox() {
    var set = gallerySets[currentSet];
    var item = set && set[currentImageIndex];
    var stage = document.getElementById('lightbox-stage');
    var img = document.getElementById('lightbox-img');
    var title = document.getElementById('lightbox-title');
    var subtitle = document.getElementById('lightbox-subtitle');
    var caption = document.querySelector('.lightbox-caption');
    if (!item || !stage) return;

    // Clear any previously injected rich node.
    var prevNode = stage.querySelector('.lightbox-node');
    if (prevNode) prevNode.remove();

    if (item.node) {
        if (img) img.style.display = 'none';
        var node = (typeof item.node === 'function') ? item.node() : item.node;
        if (node) { node.classList.add('lightbox-node'); stage.appendChild(node); }
    } else if (img) {
        img.style.display = '';
        img.src = item.src;
        img.alt = item.alt || '';
    }

    if (title) title.textContent = item.title || '';
    if (subtitle) subtitle.textContent = item.subtitle || '';
    if (caption) caption.style.display = (item.title || item.subtitle) ? '' : 'none';
}

function navigateLightbox(direction) {
    var set = gallerySets[currentSet];
    if (!set) return;
    currentImageIndex += direction;
    if (currentImageIndex < 0) currentImageIndex = set.length - 1;
    else if (currentImageIndex >= set.length) currentImageIndex = 0;
    updateLightbox();
}

function closeLightbox() {
    var lb = document.getElementById('lightbox');
    if (lb) {
        lb.classList.remove('active');
        document.body.style.overflow = '';
    }
}

function initLightbox() {
    buildLightboxDOM();
    window.openLightbox = openLightbox;
    window.openLightboxFromSet = openLightboxFromSet;
    window.closeLightbox = closeLightbox;
    window.navigateLightbox = navigateLightbox;

    document.addEventListener('keydown', function (event) {
        var lightbox = document.getElementById('lightbox');
        if (!lightbox || !lightbox.classList.contains('active')) return;
        if (event.key === 'Escape') closeLightbox();
        else if (event.key === 'ArrowLeft') navigateLightbox(-1);
        else if (event.key === 'ArrowRight') navigateLightbox(1);
    });
}

// --- Updates timeline: game filter + month tabs (updates.html only) ---
function initUpdatesFilter() {
    var typeBar = document.getElementById('updates-filter');
    if (!typeBar) return;
    var monthBar = document.getElementById('updates-months');
    var months = Array.prototype.slice.call(document.querySelectorAll('.jw-tl-month'));
    var typeButtons = typeBar.querySelectorAll('button');
    var monthButtons = monthBar ? monthBar.querySelectorAll('button') : [];
    var state = { type: 'all', month: 'all' };

    function cardMatches(card, type) {
        var t = card.getAttribute('data-type');
        return type === 'all' || t === type || t === 'both';
    }
    function monthHasType(month, type) {
        return Array.prototype.slice.call(month.querySelectorAll('.jw-card')).some(function (c) {
            return cardMatches(c, type);
        });
    }
    function monthByKey(key) {
        return months.filter(function (m) { return m.getAttribute('data-month') === key; })[0];
    }

    function apply() {
        // A month tab is available only if it has cards under the current game filter.
        monthButtons.forEach(function (b) {
            var key = b.getAttribute('data-month');
            if (key === 'all') return;
            var m = monthByKey(key);
            b.disabled = !(m && monthHasType(m, state.type));
        });
        // If the selected month has nothing under the new filter, fall back to All.
        if (state.month !== 'all') {
            var m = monthByKey(state.month);
            if (!m || !monthHasType(m, state.type)) state.month = 'all';
        }
        // Show/hide sections and cards.
        months.forEach(function (month) {
            var inMonth = state.month === 'all' || state.month === month.getAttribute('data-month');
            var anyVisible = false;
            month.querySelectorAll('.jw-card').forEach(function (card) {
                var show = inMonth && cardMatches(card, state.type);
                card.hidden = !show;
                if (show) anyVisible = true;
            });
            month.hidden = !anyVisible;
        });
        typeButtons.forEach(function (b) {
            b.setAttribute('aria-pressed', b.getAttribute('data-filter') === state.type ? 'true' : 'false');
        });
        monthButtons.forEach(function (b) {
            b.setAttribute('aria-selected', b.getAttribute('data-month') === state.month ? 'true' : 'false');
        });
    }

    typeButtons.forEach(function (b) {
        b.addEventListener('click', function () { state.type = b.getAttribute('data-filter'); apply(); });
    });
    monthButtons.forEach(function (b) {
        b.addEventListener('click', function () {
            if (b.disabled) return;
            state.month = b.getAttribute('data-month');
            apply();
        });
    });
    apply();
}

// --- Main init ---
function init() {
    initMobileMenu();
    initCookieBanner();
    injectCTA();

    initSmoothScroll();
    initLightbox();
    initUpdatesFilter();

    if (getPageId() === 'contact') initContactForm();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
