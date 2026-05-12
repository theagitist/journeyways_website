---
tags: [journeyways, game-design-notes, project-planning]
---

# Production, materials, and distribution

This document describes how the JOURNEYWAYS physical boardgame is **made and distributed**: the components inventory, the materials and substrates, the source-file locations, the trilingual localisation workflow, the IP and licensing posture, and the framework-template flow for player-authored variants. It is the production-side counterpart to the videogame's `docs/INFRASTRUCTURE.md`, which describes a runtime stack.

Claims here are anchored to source-file directories under `~/FileShare/jw/game materials/`, to published PDFs at <https://www.journeyways.ca/download/>, and to the upstream inventory at `~/apps/obsidian/Academia/Journeyways/Foundations/game-materials.md`. Items marked **TBC** name a decision that hasn't been canonicalised yet; items marked **planned** name work queued for after v1.0 distribution or after BREB approval.

## 1. Scope

This document covers the **production-side** infrastructure of the boardgame: the components, the materials, the source files, the manufacturing partners, and the workflow that takes a card or a tile from concept to printed object. It does not cover the human processes of playtesting (those are in [PLAYTESTING.md](PLAYTESTING.md)) or the governance of session-derived materials ([DATA_GOVERNANCE.md](DATA_GOVERNANCE.md)).

The marketing-site at <https://www.journeyways.ca> hosts the public-facing artefacts (the rulebook and player booklet PDFs, this documentation set, the brand spec); its own runtime and serving story live in `/var/www/CLAUDE.md` and `/var/www/INFRASTRUCTURE.md`.

## 2. Components inventory (v1.0)

The shipping components, by category, as documented in the rulebook and in `~/apps/obsidian/Academia/Journeyways/Foundations/game-materials.md`.

### 2.1 The canonical triad

JOURNEYWAYS is identified by three component classes; variants can replace one or more of them and still be JOURNEYWAYS in framework form, but the triad is what ships in v1.0:

| Component | Count | Role |
|---|---|---|
| Map tiles | 35 | The board. Location and context. |
| Cards | 81 across 5 piles | Stimulus and event. |
| Player booklet | 1 per player | Expression and archive. |

### 2.2 Cards (81, across five piles)

The five piles are colour-coded and category-named:

| Colour | Category | Role | Approximate count |
|---|---|---|---|
| Red | Encounters | Evocative identity-themed prompts | (per `game-materials.md`) |
| Blue | Reflections | Curated quotations from queer, feminist, civil-rights, and literary figures | (per `game-materials.md`) |
| Green | Movement | Simple physical instructions | (per `game-materials.md`) |
| Black | Countdown | Short poetic time-passing phrases. Default rule: 5 drawn = session ends | (per `game-materials.md`) |
| Purple | Group actions | Cross-player interaction prompts. **Most-requested expansion target for v2.** | (per `game-materials.md`) |

Per-pile counts and sample content live in `~/apps/obsidian/Academia/Journeyways/Foundations/game-materials.md`. The Blue pile is itself a small curated bibliography of queer thought; authors named on the Blue cards are listed there.

### 2.3 Map tiles (35)

Wordless illustrations on a square format. The shipping tiles span memory (e.g. Childhood House, Abandoned Playground), nature and elemental settings (Mountain Peak, Misty Trail, Volcanic Ground, Tree Hollow), mythic geography (Star Bridge, Singing Cave, Mirror Lake), grief and historical erasure (Buried Names Field, Night Way), and reflective interiors (Study Room). One **Start** tile anchors every session. Full list in `Foundations/game-materials.md`.

### 2.4 Player booklet

One booklet per player per session. Contains: character-creation prompts, journaling structure, the character-sheet page at the back, and reference material the player can consult during play. Source layout in `~/FileShare/jw/game materials/Player Booklet/`; published PDF at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Player%20Booklet.pdf>.

### 2.5 Rulebook

A single rulebook per copy. Short, terse, intentionally rules-light. Source layout in `~/FileShare/jw/game materials/Rulebook/`; published PDF at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Rulebook.pdf>.

### 2.6 Packaging

**TBC.** The packaging design and material specification for a shipped copy of v1.0 is not yet canonicalised. Current playtest sets use functional packaging; a finalised design is planned alongside v2.

## 3. Print and materials

The material qualities are part of the game's design intent. The rulebook describes the materiality as **"simple-yet-sensorial"** — the act of placing a solid piece is part of the expressive act, and the visual identity (hand-made, organic, playful) and the material identity are coherent. See `Foundations/proposal-summary.md` ("Material qualities") for the design philosophy behind these choices.

### 3.1 Cards

- **Substrate**: card stock that "feels nice in the hands." Specific stock weight and finish **TBC** and to be specified when v1.0 enters small-batch production.
- **Format**: card layout source in `~/FileShare/jw/game materials/Cards/`. Card backs are colour-coded by category (Red / Blue / Green / Black / Purple); card fronts carry the category name printed in text alongside the colour, for colour-blind accessibility (see [COMPLIANCE.md §5.3](COMPLIANCE.md#53-physical-accessibility)).
- **Finish**: **TBC**. Considerations include glare in playtest venues (matte finish preferred), durability under repeated handling, and feel against the table.

### 3.2 Map tiles

- **Substrate**: cardboard or wooden tiles. The rulebook's canonical phrasing is "cardboard or wooden tiles"; v1.0 playtest tiles are **TBC**.
- **Format**: 900×900 px source artwork (per the marketing site's lightbox conventions). Square format. Each tile is identified by a name in English with French and Spanish translations on a separate index card or in the rulebook glossary.
- **Visual style**: white background, hand-drawn line silhouettes of an iconic central element, surrounded and layered with vivid watercolour splotches in mixed colours. See `Foundations/proposal-summary.md` ("Visual style of the shipping materials").

### 3.3 Player booklet and rulebook

- **Substrate**: paper, in a weight that supports both reading and writing (the booklet is also a journaling surface). Specific weight and binding **TBC**.
- **Format**: A5 or letter-fold **TBC**. Rulebook PDF and player booklet PDF live in `download/` on the marketing site (Ghostscript-optimised via `-dPDFSETTINGS=/ebook` per the marketing-site CLAUDE.md).
- **Typography**: sans-serif at a legible body size. The marketing site's brand spec ([brand-spec.md](https://www.journeyways.ca/brand-spec.md)) is the canonical type reference; print derivatives should align with the same typography rules (Italianno only at display sizes; Inter for body).

## 4. Localisation (trilingual)

JOURNEYWAYS commits to a trilingual launch: **English, French, Spanish**. The localisation workflow:

1. **Authoring language is English.** Card prompts, tile names, rulebook copy, and player booklet copy are authored in English first.
2. **Manual translation to French and Spanish** by a human translator. **No machine translation of card content**, in keeping with the project's stance against generative-AI mediation of card and prompt text (see `Foundations/proposal-summary.md`, "A note on AI-generated assets").
3. **Native-speaker proofing** on each language pass. Spanish gets particular attention because gendered grammar is the default; gender-neutral alternatives are used throughout (see [COMPLIANCE.md §5.2](COMPLIANCE.md#52-gender-neutral-language)).
4. **Per-language production**: depending on print partner and distribution model, copies may be produced as single-language sets (one box, one language) or as combined multilingual sets (one box with three layered card faces). **TBC** for v1.0 distribution.
5. **Glossary maintenance** for tile names, card categories, and key game terms, so translations stay consistent across the rulebook, player booklet, cards, and the framework templates.

The marketing site at <https://www.journeyways.ca> is currently English-only; trilingual marketing content is planned alongside the wider trilingual launch. The videogame at <https://play.journeyways.ca> already ships trilingual interface text (EN / FR / ES); see its `docs/COMPLIANCE.md §5.1`.

## 5. Print and manufacturing partners

**TBC.** The print partner(s) and manufacturer(s) for v1.0 distribution have not been finalised. The candidates evaluated to date and the criteria for selection (Canadian residency, ability to produce small batches, ability to handle wooden tiles if that substrate is chosen, willingness to work with the open-source / Creative Commons licensing of the content) will be documented here once the decision lands.

Considerations that constrain the choice:

- **Data residency**: production files are shared with the partner under a working agreement that does not transfer ownership. The files contain no participant data, so cross-border production is acceptable, but a Canadian partner is preferred where cost and capability allow.
- **Substrate flexibility**: the wood-vs-cardboard tile choice may select for one partner over another.
- **Trilingual workflow**: a partner that can handle three-language plate proofing efficiently is preferred over one that requires separate runs for each language.
- **Small-batch capability**: v1.0 distribution is research-scoped, not commercial-scale. Print-on-demand or short-run capability matters more than per-unit cost at volume.

## 6. IP and licensing

The project's licensing posture is documented in the proposal summary at `Foundations/proposal-summary.md` ("Open source") and is summarised here for production planning.

### 6.1 Software (the videogame)

The play.journeyways.ca codebase is open-source under a permissive licence (specific licence **TBC** at publication time). Anyone may fork. Forks that distribute must share back.

### 6.2 Creative content (cards, tiles, rulebook, player booklet)

Released under a Creative Commons licence (specific CC variant **TBC** at publication time). The project's stated principle is: *"Knowledge must be shared with the people who need it the most."* The licence will permit derivative variants while requiring attribution and share-alike.

### 6.3 Curated quotations on Blue cards

The Blue pile contains quotations from queer, feminist, civil-rights, and literary figures. Each quotation is credited to its author on the card. The project relies on **fair-dealing / fair-use** for the inclusion of short attributed quotations in an educational and research context. A formal copyright review is **planned** before any commercial-scale distribution; in the playtest and research-scope distribution, the fair-dealing posture is adequate. See `Foundations/game-materials.md` for the roster.

### 6.4 Watercolour backgrounds (Adobe Firefly)

Decorative watercolour textures on tile and card backgrounds were generated in **Adobe Firefly**, Adobe's generative AI image tool, under Firefly's commercial-use terms. The shipping map tiles combine **human-authored line drawings** of the central element with these AI-generated splotch backgrounds. Card prompts, card text, tile concepts, and the curated quotations are **human-authored**. This distinction is documented in `Foundations/proposal-summary.md` ("A note on AI-generated assets") and is the project's honest position on AI in materials:

- **Card and tile content** (prompts, text, concepts, illustrations of specific things) — human-authored.
- **Background textures and decorative substrate** — may be AI-generated under Firefly's commercial terms.

If the project is ever asked to defend a fully-AI-free position, the honest answer is the one above: prompts and content are authored; some textures and backgrounds use generative tools under commercial licensing.

### 6.5 Wordmark and logo

The JOURNEYWAYS wordmark and visual identity are project-owned. The marketing site's [brand-spec.md](https://www.journeyways.ca/brand-spec.md) is the canonical reference for usage rules across the site, print, and the videogame UI.

## 7. Framework templates (planned)

A core commitment of the project is that the **framework** is reusable: mechanics and rules are open, default content can be replaced. The framework templates queued for publication:

- **Card template** for player-authored card sets, with the five-pile structure preserved (or replaceable). Typeset (likely in Typst — see the videogame `docs/ROADMAP.md §4`).
- **Tile template** for player-authored map tiles. Same square format and visual-style notes as v1.0.
- **Rulebook template** for variants that re-skin the game for a different identity-exploration domain. Editable by the variant author.
- **Player booklet template** for variants. Editable by the variant author.

The templates will be hosted on the marketing site for download under a Creative Commons licence aligned with the rest of the project's content. A **community library** of player-authored variants will be curated separately, under guidelines (the project's two-tier governance: framework open, library curated).

Queued in [ROADMAP.md](ROADMAP.md).

## 8. Source files and version control

Source files for the boardgame's physical materials live on the researcher's local machine at `~/FileShare/jw/`, outside any committed git repository. The relevant subdirectories:

```
~/FileShare/jw/
├── Adri M - Proposal.docx
├── proposal-long.docx
└── game materials/
    ├── Rulebook/
    ├── Player Booklet/
    ├── Cards/
    │   ├── Cards.docx                  # card content
    │   └── card backgrounds/           # background textures (Firefly + handwork)
    ├── Map Tiles/
    └── assorted/                       # asset library, mixed
```

Published PDFs (rulebook, player booklet) are committed to the marketing-site repo at `/var/www/www.journeyways.ca/download/`, where they are Ghostscript-optimised before commit (see the marketing-site CLAUDE.md for the optimisation command).

Card and tile source artwork is **not** committed; only the rendered PDFs go to the marketing site. If a version-control regime is later wanted for the source artwork, the candidate is a separate, private git repository (or a Git LFS extension on an existing one), not the marketing-site repo.

## 9. Distribution

**TBC.** The v1.0 distribution model is not yet finalised. Constraints that shape the decision:

- **Research-scoped distribution.** v1.0 is built for playtest and post-BREB research sessions, not for commercial sale. Small-batch production and direct hand-off to playtest cohorts is the primary mode.
- **Print-and-play.** The published rulebook and player booklet PDFs are available on the marketing site. A future "print-and-play" track for the cards and tiles (sized for home printing and at-home assembly) is **planned** and would be the most accessible distribution for the framework, separate from the manufactured copies.
- **Manufactured copies** for facilitated sessions and for partnered organisations. Quantities, partners, and pricing **TBC**.

A public distribution channel (a small webshop, a partnership with an educational distributor, a creative-commons download portal) is queued for after v1.0 stabilises and the research phase is underway.

## 10. Versioning

The boardgame uses a simple version scheme:

- **v1.0** — current edition. 35 tiles, 81 cards in 5 piles, rulebook, player booklet. Three playtests held to date.
- **v2** — planned. Most-requested changes: more Purple cards, more Red variety, card-type rebalancing, incorporation of user-created tiles surfaced in playtests. Queued in [ROADMAP.md](ROADMAP.md). Timing depends on the research phase opening (BREB summer 2026) and on playtest cycle completion.
- **Framework variants** (v1.x author-named) — separate from the canonical v1 / v2 line. Variants authored by other parties carry their own version namespace and are curated separately.

The videogame at <https://play.journeyways.ca> has its own version scheme aligned with software-release norms (currently `v0.6.2-alpha`). Boardgame and videogame versions are independent.

## 11. Known gaps

Documented for transparency. Each maps to an entry in [ROADMAP.md](ROADMAP.md).

### 11.1 Print partner not yet chosen

See [§5](#5-print-and-manufacturing-partners). Will be canonicalised when v1.0 enters small-batch production.

### 11.2 Substrate decisions for v1.0 not yet final

Card stock weight, card finish, tile material (wooden vs cardboard), booklet binding. Each is named **TBC** above and resolved at print time.

### 11.3 Packaging not yet designed

[§2.6](#26-packaging). Current playtest sets use functional packaging.

### 11.4 Framework templates not yet published

[§7](#7-framework-templates-planned). Drafting depends on choosing a typesetting source (Typst is the working candidate, aligned with the videogame's queued Typst toolchain for cards and tiles).

### 11.5 Source-file inventory under `~/FileShare/jw/` not fully canonicalised

The folder structure above is the working layout; specific filenames for the rulebook source layout, the player booklet source layout, and the photo waiver are pending canonicalisation. Listed in [COMPLIANCE.md §9.2](COMPLIANCE.md#92-photo-waiver-source-of-truth-file-not-yet-canonicalised) and tracked in [ROADMAP.md](ROADMAP.md).

### 11.6 No formal infrastructure-as-code for production decisions

Each production decision (substrate, partner, finish, binding) is currently captured in conversation and email rather than declared in a structured production manifest. This is acceptable at v1.0 scope; if the project moves to wider distribution, a manifest would help reproducibility.

## 12. Verification

To verify the claims in this document:

1. Read [COMPLIANCE.md](COMPLIANCE.md) for the licensing-and-accessibility framework mapping, and [DATA_GOVERNANCE.md](DATA_GOVERNANCE.md) for the (Tier C) production-materials handling.
2. Inspect the published PDFs at <https://www.journeyways.ca/download/>.
3. Inspect the upstream design dossier at `~/apps/obsidian/Academia/Journeyways/Foundations/game-materials.md` for the components inventory and the visual-style notes.
4. Inspect the source files at `~/FileShare/jw/game materials/` (researcher's local machine; not part of any public repository).
5. Read the marketing-site brand spec at <https://www.journeyways.ca/brand-spec.md> for the typography and palette rules that govern print derivatives.

## 13. Document control

| Field | Value |
|---|---|
| Game version | v1.0 (playtest edition) |
| Document version | 1.0 |
| Last reviewed | 2026-05-12 |
| Owner | Adri M. |
| Sibling documents | `COMPLIANCE.md`, `PRIVACY.md`, `DATA_GOVERNANCE.md`, `PLAYTESTING.md`, `ROADMAP.md` |
