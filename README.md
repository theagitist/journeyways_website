# JOURNEYWAYS Website

A website for JOURNEYWAYS, a game about becoming, exploring, and self-discovery.

## About JOURNEYWAYS

JOURNEYWAYS is not about winning or losing; it's about discovering, exploring, and becoming. This collaborative storytelling game invites players to explore selfhood through motion, memory, and meaning. Whether playing solo or in a group, each session reveals a story made only by your presence.

### Key Features

- **No Fixed Roles**: Discover your character through play, not predetermined archetypes
- **Collaborative Storytelling**: Co-create narratives that reveal deeper truths about identity
- **Continuous Growth**: Each session builds upon the last, creating an evolving journey
- **Solo or Group Play**: Adapts to your preferred style of play
- **Meaningful Choices**: Every decision carries weight and reveals aspects of yourself

## Website Structure

```
journeyways_website/
├── index.html          # Homepage with game overview
├── boardgame.html      # Complete game rules and instructions
├── photos.html         # Photo gallery of the game
├── videogame.html      # Video game page (coming soon)
├── download/          # Downloadable PDF files
│   ├── JOURNEYWAYS Game Rules 1.0.pdf
│   └── JOURNEYWYS Character Sheet 1.0.pdf
├── img/               # Game images and assets (SEO optimized)
│   ├── logo_bg_only.png    # Favicon (optimized)
│   ├── logo_bg_only.jpg    # Background image (optimized)
│   ├── logo_bg_only.webp   # WebP version for better compression
│   ├── boardgame_setup.jpg     # Game Setup photo (optimized)
│   ├── boardgame_components.jpeg  # Large gallery image (optimized)
│   ├── players_in_action.jpeg  # Large gallery image (optimized)
│   ├── no_fixed_roles.jpg  # Feature image (optimized)
│   ├── collaborative_storytelling.jpg  # Feature image (optimized)
│   ├── continuous_growth.jpg  # Feature image (optimized)
│   ├── boardgame_components.jpg  # Index page image (optimized)
│   ├── backup/         # Backup of original images before optimization
│   └── thumbnails/        # Optimized thumbnail images for gallery
│       ├── boardgame_setup_thumb.jpg
│       ├── boardgame_components_thumb.jpg
│       └── players_in_action_thumb.jpg
└── README.md          # This file
```

## Pages

### Homepage (`index.html`)
- Hero section with game title and tagline
- About the game section
- Key features showcase
- Solo vs group play information
- Responsive navigation (desktop menu / mobile hamburger menu)
- Scrolling marquee announcement banner featuring:
  - ProtoConBC feature (October 2025)
  - UBC Critical Play Fellowship participation

### Board Game (`boardgame.html`)
- Complete game setup instructions
- Basic gameplay mechanics
- Turn structure (Explore, Draw, Reflect)
- Card types and their meanings
- Solo vs group play guidelines
- Advanced concepts and tips
- Download buttons for PDF versions
- Responsive navigation (desktop menu / mobile hamburger menu)

### Photos (`photos.html`)
- Visual gallery of game components
- Game setup and play examples
- Interactive lightbox modal with navigation (previous/next buttons)
- Image captions with titles and subtitles
- Crossfade transitions between images
- Keyboard navigation support (arrow keys, escape)
- Optimized thumbnail images for faster page loading
- "Ready to Begin?" section with download links
- Responsive navigation (desktop menu / mobile hamburger menu)

### Video Game (`videogame.html`)
- Coming soon page for the digital version of JOURNEYWAYS
- Responsive navigation (desktop menu / mobile hamburger menu)
- Footer with copyright information

## Downloads

The website provides downloadable PDF files accessible from the "Ready to Begin?" section on both the rules and photos pages:
- **Game Rules PDF** (`download/JOURNEYWAYS Game Rules 1.0.pdf`): Complete rulebook in PDF format
- **Character Sheet PDF** (`download/JOURNEYWYS Character Sheet 1.0.pdf`): Printable character sheet for players

## Navigation

The website features a responsive navigation system:

- **Desktop Navigation**: Horizontal menu bar with links to Home, Game Rules, and Photos (visible on medium screens and larger)
- **Mobile Navigation**: Hamburger menu button (visible on mobile devices) that opens a dropdown menu with:
  - Home
  - Game Rules
  - Photos
- The mobile menu automatically closes when a link is clicked
- Navigation is consistent across all pages

## Technology

- **HTML5**: Semantic markup
- **Tailwind CSS**: Utility-first CSS framework (via CDN)
- **Custom Fonts**: Adobe Typekit fonts (dream-big-wide, aptos)
- **Responsive Design**: Mobile-first approach with hamburger menu for mobile devices
- **JavaScript**: Vanilla JavaScript for mobile menu toggle and lightbox functionality
- **Image Optimization**: 
  - All JPEG images optimized to 85% quality using `jpegoptim`
  - PNG images optimized using `optipng`
  - Large images converted to WebP format for better compression
  - Total size reduction: ~62% (from 12.2 MB to 4.6 MB)
  - Images include width/height attributes and lazy loading for SEO
- **Performance Optimizations**:
  - Non-blocking font loading with `font-display: swap`
  - Deferred scripts to prevent render blocking
  - Efficient cache lifetimes configured (see Cache Configuration below)

## Setup

1. Clone the repository:
   ```bash
   git clone git@github.com:theagitist/journeyways_website.git
   ```

2. Open `index.html` in a web browser or serve via a web server

3. For local development with a web server:
   ```bash
   # Using Python
   python3 -m http.server 8000
   
   # Using Node.js (http-server)
   npx http-server
   ```

## Cache Configuration

The website includes efficient cache headers to speed up repeat visits:

- **Images** (jpg, jpeg, png, webp, svg, ico): 1 year cache with `immutable` flag
- **Fonts** (woff, woff2, ttf, otf): 1 year cache with `immutable` flag
- **CSS/JavaScript**: 1 month cache
- **PDFs**: 1 month cache
- **HTML files**: 1 hour cache with `must-revalidate` for content updates
- **XML files**: 1 day cache

### Apache Configuration

The `.htaccess` file is included and will automatically configure caching if your server supports `mod_expires` and `mod_headers`.

### Nginx Configuration

For Nginx servers, see `nginx.conf.example` for cache configuration. Include these settings in your server block.

## Game Components

The game includes:
- Board tiles (35)
- Game cards (81)
- Player tokens (1 per player)
- Player booklets (1 per player)
- Sticky notes
- Die for choosing starting player
- Writing utensils

## Card Types

- **Green Cards**: Movement
- **Black Cards**: Pass of time (game ends when 5th is drawn)
- **Blue Cards**: Quotes
- **Red Cards**: Encounters
- **Purple Cards**: Group events

## Changelog

### Version 1.4.7
- Implemented efficient cache lifetimes for all static assets:
  - Images and fonts: 1 year cache with `immutable` flag
  - CSS/JavaScript: 1 month cache
  - HTML files: 1 hour cache with revalidation
  - Added `.htaccess` file for Apache servers
  - Added `nginx.conf.example` for Nginx servers
  - Enabled gzip compression for text-based files
  - Improved repeat visit performance significantly

### Version 1.4.5
- Optimized all images for SEO and performance:
  - JPEG images optimized to 85% quality (saved ~3-13% per image)
  - PNG images optimized using optipng (saved 44.68% on logo_bg_only.png)
  - Large PNG converted to WebP format (logo_bg_only.webp - 270KB vs 3.6MB optimized PNG)
  - Total image size reduction: ~62% (from 12.2 MB to 4.6 MB estimated)
  - Added backup directory for original images
  - Images now include proper width/height attributes and lazy loading
  - Improved Core Web Vitals (LCP, CLS) for better SEO scores

### Version 1.4.3
- Added comprehensive SEO meta tags to all pages (description, keywords, Open Graph, Twitter Cards)
- Added canonical URLs to all pages
- Updated author meta tag to "Adri M. (theagitist)"
- Enhanced SEO-friendly title tags for all pages
- Added detailed SEO-friendly alt text to all images
- Generated sitemap.xml for search engine optimization

### Version 1.4.2
- Renamed image files: photo1 → boardgame_setup, game_components → boardgame_components
- Updated photo titles: "Game Setup" → "Board Game Setup", "Game Components" → "Board Game Components"
- Updated footer download button text: "Download Game Rules PDF" → "Download Board Game Rules PDF"
- Removed "Back to Home" button from footer sections
- Added "Ready to Begin?" section to Video Game page

### Version 1.4.1
- Added cookie consent banner to all pages
- Integrated Google Analytics (G-3W5YQCJ0FQ) with cookie consent - only tracks after user accepts cookies

### Version 1.4
- Renamed `rules.html` to `boardgame.html` for consistency with navigation naming

### Version 1.3
- Added Video Game page with "coming soon" content
- Updated navigation: changed "Board Game Rules" to "Board Game" in nav bars
- Reordered navigation: moved Photos to last position
- Optimized Photos page: created thumbnails for faster loading (gallery uses thumbnails, lightbox uses full-size images)
- Fixed footer positioning on Video Game page

### Version 1.2
- Changed all references from "board game" to "game"

### Version 1.1
- Added automatic redirect to `www.journeyways.ca` if accessed via different hostname
- Updated copyright notice to 2025-2026

### Version 1.0
- Initial release

## License

© 2025-2026 JOURNEYWAYS. A game about becoming.

## Repository

GitHub: [theagitist/journeyways_website](https://github.com/theagitist/journeyways_website)

