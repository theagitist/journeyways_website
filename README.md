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
├── rules.html          # Complete game rules and instructions
├── photos.html         # Photo gallery of the game
├── download/          # Downloadable PDF files
│   ├── JOURNEYWAYS Game Rules 1.0.pdf
│   └── JOURNEYWYS Character Sheet 1.0.pdf
├── img/               # Game images and assets (optimized)
│   ├── logo_bg_only.png    # Favicon
│   ├── logo_bg_only.jpg    # Background image
│   ├── photo1.jpg          # Game Setup photo
│   ├── game_components.jpeg
│   ├── players_in_action.jpeg
│   ├── no_fixed_roles.jpg
│   ├── collaborative_storytelling.jpg
│   ├── continuous_growth.jpg
│   └── game_components_placeholder.jpg
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

### Game Rules (`rules.html`)
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
- "Ready to Begin?" section with download links
- Responsive navigation (desktop menu / mobile hamburger menu)

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
- **Image Optimization**: Images optimized using ffmpeg for better performance

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

