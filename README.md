# JOURNEYWAYS Website

A website for JOURNEYWAYS, a board game about becoming, exploring, and self-discovery.

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
├── img/               # Game images and assets
│   ├── logo.png
│   ├── logo_bg_only.png
│   └── [various game photos]
├── JOURNEYWAYS_Game_Rules.pdf    # Generated PDF version of rules
├── JOURNEYWAYS_Game_Rules.docx   # Generated Word version of rules
├── generate_pdf.py     # Script to generate PDF from rules.html
├── generate_word.py   # Script to generate Word doc from rules.html
└── README.md          # This file
```

## Pages

### Homepage (`index.html`)
- Hero section with game title and tagline
- About the game section
- Key features showcase
- Solo vs group play information

### Game Rules (`rules.html`)
- Complete game setup instructions
- Basic gameplay mechanics
- Turn structure (Explore, Draw, Reflect)
- Card types and their meanings
- Solo vs group play guidelines
- Advanced concepts and tips
- Download buttons for PDF versions

### Photos (`photos.html`)
- Visual gallery of game components
- Behind-the-scenes content
- Game setup and play examples
- Note: Navigation is hidden on this page

## Downloads

The website provides downloadable PDF files accessible from the "Ready to Begin?" section on the rules page:
- **Game Rules PDF** (`download/JOURNEYWAYS Game Rules 1.0.pdf`): Complete rulebook in PDF format
- **Character Sheet PDF** (`download/JOURNEYWYS Character Sheet 1.0.pdf`): Printable character sheet for players

Additionally, generated versions of the rules are available in the root directory:
- `JOURNEYWAYS_Game_Rules.pdf` - PDF version generated from rules.html
- `JOURNEYWAYS_Game_Rules.docx` - Word document version generated from rules.html

## Technology

- **HTML5**: Semantic markup
- **Tailwind CSS**: Utility-first CSS framework (via CDN)
- **Custom Fonts**: Adobe Typekit fonts (dream-big-wide, aptos)
- **Responsive Design**: Mobile-first approach

## Development Tools

The repository includes Python scripts for generating document versions:
- `generate_pdf.py`: Converts rules.html to PDF using WeasyPrint
- `generate_word.py`: Converts rules.html to Word document using python-docx and BeautifulSoup

To use these scripts, install the required dependencies:
```bash
pip install weasyprint python-docx beautifulsoup4
```

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

## License

© 2025 JOURNEYWAYS. A board game about becoming.

## Repository

GitHub: [theagitist/journeyways_website](https://github.com/theagitist/journeyways_website)

