# JOURNEYWAYS Website

A website for JOURNEYWAYS, a research project and game about becoming, exploring, and self-discovery. Rooted at the University of British Columbia (UBC), this project explores identity through collaborative storytelling and play.

## About JOURNEYWAYS

JOURNEYWAYS is not about winning or losing; it's about discovering, exploring, and becoming. This collaborative storytelling project invites players to explore selfhood through motion, memory, and meaning. Whether playing solo or in a group, each session serves as a transformative space for exploring identity and agency beyond arbitrary categories.

### Key Features

- **No Fixed Roles**: Discover your character through play, not predetermined archetypes.
- **Collaborative Storytelling**: Co-create narratives that reveal deeper truths about identity.
- **Continuous Growth**: Each session builds upon the last, creating an evolving journey.
- **Solo or Group Play**: Adapts to your preferred style of play.
- **Meaningful Choices**: Every decision carries weight and reveals aspects of yourself.

## Website Structure

journeyways_website/
├── index.html          # Homepage with research overview and hero title
├── boardgame.html      # Complete board game rules and instructions
├── photos.html         # Photo gallery of the game components
├── videogame.html      # Digital iteration dev log (under development)
├── css/
│   └── styles.css      # Custom animations (marquee) and typography
├── download/           # Downloadable PDF research/game files
├── img/                # Optimized game assets and feature images
└── README.md           # This file

## Pages

### Homepage (`index.html`)
- **Hero Header**: Features a responsive, massive "Journeyways" title (`12vw`) to establish project identity.
- **Announcement Marquee**: A stabilized, slow-scrolling (`100s`) orange banner featuring:
  - ProtoConBC feature (October 2025).
  - UBC Critical Play Fellowship participation.
  - Link to the digital iteration "under development."
- **Research Context**: Overview of the project's philosophy on identity and storytelling.

### Board Game (`boardgame.html`)
- **Unified Branding**: Synchronized `5xl` header and navigation to match the site-wide aesthetic.
- **Gameplay Mechanics**: Detailed breakdown of the Explore, Draw, and Reflect phases.
- **Resources**: Direct access to printable rules and character sheets.

### Photos (`photos.html`)
- **Visual Evidence**: Gallery showing physical components and "in-action" play.
- **Lightbox Integration**: Interactive modal for high-resolution viewing.
- **Performance**: Uses optimized thumbnails to maintain fast LCP (Largest Contentful Paint).

### Video Game (`videogame.html`)
- **Digital Iteration**: Development log and vision for the software version of JOURNEYWAYS.
- **Design Consistency**: Unified header spacing and navigation to ensure a seamless transition from the physical game pages.

## Navigation & UI

The website features a unified, responsive navigation system:
- **Logo**: Enlarged "JOURNEYWAYS" script logo in the navbar for better brand visibility.
- **Consistency**: Synchronized navigation height (`py-6`) and content padding (`pt-32`) across all pages to prevent "jumping" during transitions.
- **Mobile Support**: Fully responsive hamburger menu for smaller devices.
- **Interactive Marquee**: The announcement bar pauses precisely on hover (triggered by the container) to allow easy interaction with links.

## Technology Stack

- **HTML5**: Semantic markup for accessibility and SEO.
- **Tailwind CSS**: Primary utility-first framework for layout, spacing, and responsive scaling.
- **Custom CSS**: Used for specialized animations (infinite loops), z-index management, and hardware-accelerated transforms to prevent jitter.
- **Adobe Typekit**: Integration of `dream-big-wide` and `aptos` for a professional, academic aesthetic.
- **Vanilla JavaScript**: Lightweight logic for mobile menu toggles and lightbox functionality.

## Development & Cleanup

The project follows a "lean" philosophy:
- **Zero-Dependency Nav**: No heavy JS libraries for navigation; uses CSS-first positioning.
- **Performance**: Minimal custom CSS leftovers; Tailwind is used for 90% of the UI to ensure fast rendering.
- **Secular & Inclusive**: Language is strictly gender-neutral and secular, aligning with the project's research focus on gender-diverse and migrant experiences.

## Changelog

### Version 1.5.0 (Current)
- **UI Unification**: Synchronized Navbar height and Logo size across all pages.
- **Typography Overhaul**: Implemented responsive `12vw` hero title and unified `5xl` section headers.
- **Marquee Stabilization**: Fixed "jitter" and "jumping" bugs using hardware acceleration (`will-change: transform`) and increased duration to `100s`.
- **Code Pruning**: Removed unused Tailwind CDN leftovers and redundant CSS padding rules to improve load speed.
- **Layout Fixes**: Adjusted top margins to ensure headers are never obscured by the fixed navigation bar.

### Version 1.4.7
- Implemented efficient cache lifetimes for static assets.
- Optimized render-blocking resources (Typekit non-blocking loading).

## License

© 2025-2026 JOURNEYWAYS. A game about becoming. Rooted in research at UBC GRSJ.