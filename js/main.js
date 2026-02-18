/**
 * JOURNEYWAYS – global and page-specific scripts
 * Shared across index.html, videogame.html, photos.html
 */

// --- Redirect (run first) ---
(function () {
    if (window.location.hostname !== 'www.journeyways.ca') {
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
    return 'index';
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
            '<section class="py-20 bg-gradient-to-r from-yellow-400 to-orange-500 text-black">' +
            '<div class="max-w-4xl mx-auto text-center px-4">' +
            '<h2 class="script-font text-4xl font-bold text-black mb-6">Ready to Begin?</h2>' +
            '<p class="text-xl mb-8">Step into the digital version of Journeyways. Explore identity, agency, and community in a transformative interactive space.</p>' +
            '<a href="https://play.journeyways.ca" class="inline-block bg-white text-black px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors font-semibold text-lg">Play the Digital Version</a>' +
            '</div></section>';
    } else if (isIndex) {
        container.innerHTML =
            '<section class="py-20 bg-gradient-to-r from-yellow-400 to-orange-500 text-black">' +
            '<div class="max-w-4xl mx-auto text-center px-4">' +
            '<h2 class="script-font text-4xl md:text-5xl font-bold text-black mb-6 text-shadow">Ready to Begin?</h2>' +
            '<p class="text-xl mb-8">Experience the journey of identity through the physical board game.</p>' +
            '<a href="boardgame.html" class="inline-block bg-white text-black px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors">Board Game — Rules &amp; Downloads</a>' +
            '</div></section>';
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

// --- Photos: lightbox (expose openLightbox, closeLightbox, navigateLightbox for inline handlers) ---
var galleryImages = [
    {
        src: 'img/boardgame_setup.jpg',
        alt: 'JOURNEYWAYS board game setup - Full view of initial board configuration with game tiles and components ready for identity exploration gameplay',
        title: 'Board Game Setup',
        subtitle: 'Initial board configuration.'
    },
    {
        src: 'img/boardgame_components.jpeg',
        alt: 'JOURNEYWAYS board game components - Detailed view of all game pieces including cards, tiles, player tokens, and booklets for collaborative storytelling',
        title: 'Board Game Components',
        subtitle: 'Pieces that bring the game to life.'
    },
    {
        src: 'img/players_in_action.jpeg',
        alt: 'JOURNEYWAYS players in action - People engaged in playing the identity exploration board game, demonstrating collaborative storytelling and meaningful gameplay',
        title: 'Players in Action',
        subtitle: 'Connecting over gameplay.'
    }
];
var currentImageIndex = 0;

function openLightbox(index) {
    currentImageIndex = index;
    var lightbox = document.getElementById('lightbox');
    if (!lightbox) return;
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
    updateLightbox(true);
}

function updateLightbox(immediate) {
    var image = galleryImages[currentImageIndex];
    var lightboxImg = document.getElementById('lightbox-img');
    var lightboxTitle = document.getElementById('lightbox-title');
    var lightboxSubtitle = document.getElementById('lightbox-subtitle');
    var lightboxCaption = document.querySelector('.lightbox-caption');
    if (!image || !lightboxImg || !lightboxTitle || !lightboxSubtitle || !lightboxCaption) return;

    if (immediate) {
        lightboxImg.src = image.src;
        lightboxImg.alt = image.alt;
        lightboxTitle.textContent = image.title;
        lightboxSubtitle.textContent = image.subtitle;
        lightboxCaption.style.visibility = 'visible';
        lightboxImg.classList.remove('fade-out');
        lightboxImg.classList.add('fade-in');
        lightboxCaption.classList.remove('fade-out');
        lightboxCaption.classList.add('fade-in');
    } else {
        lightboxImg.classList.remove('fade-in');
        lightboxImg.classList.add('fade-out');
        lightboxCaption.classList.remove('fade-in');
        lightboxCaption.classList.add('fade-out');
        setTimeout(function () {
            lightboxImg.src = image.src;
            lightboxImg.alt = image.alt;
            lightboxCaption.style.visibility = 'hidden';
            lightboxTitle.textContent = image.title;
            lightboxSubtitle.textContent = image.subtitle;
            void lightboxCaption.offsetHeight;
            lightboxCaption.style.visibility = 'visible';
            lightboxImg.classList.remove('fade-out');
            lightboxImg.classList.add('fade-in');
            lightboxCaption.classList.remove('fade-out');
            lightboxCaption.classList.add('fade-in');
        }, 400);
    }
}

function navigateLightbox(direction) {
    currentImageIndex += direction;
    if (currentImageIndex < 0) currentImageIndex = galleryImages.length - 1;
    else if (currentImageIndex >= galleryImages.length) currentImageIndex = 0;
    updateLightbox(false);
}

function closeLightbox(event) {
    if (event.target.id === 'lightbox' || event.target.classList.contains('lightbox-close')) {
        var lb = document.getElementById('lightbox');
        if (lb) {
            lb.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
}

function initLightbox() {
    if (!document.getElementById('lightbox')) return;
    window.openLightbox = openLightbox;
    window.closeLightbox = closeLightbox;
    window.navigateLightbox = navigateLightbox;

    document.addEventListener('keydown', function (event) {
        var lightbox = document.getElementById('lightbox');
        if (!lightbox || !lightbox.classList.contains('active')) return;
        if (event.key === 'Escape') closeLightbox({ target: { id: 'lightbox' } });
        else if (event.key === 'ArrowLeft') navigateLightbox(-1);
        else if (event.key === 'ArrowRight') navigateLightbox(1);
    });
}

// --- Main init ---
function init() {
    initMobileMenu();
    initCookieBanner();
    injectCTA();

    var page = getPageId();
    if (page === 'index') {
        // index-specific inits if needed
    } else if (page === 'photos') {
        initSmoothScroll();
        initLightbox();
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
