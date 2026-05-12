---
tags: [journeyways, game-design-notes, project-planning]
---

# Docs (boardgame)

Project documentation for the **JOURNEYWAYS physical boardgame**. Each file describes one facet of the project in research-grade detail:

- [PRIVACY.md](PRIVACY.md) — what participant data is captured during sessions, where it lives, who can see it, and how a participant controls it
- [DATA_GOVERNANCE.md](DATA_GOVERNANCE.md) — classification of research materials, chain of custody, anonymisation, retention, integrity, and custody-of-materials controls
- [COMPLIANCE.md](COMPLIANCE.md) — mapping to TCPS 2, UBC BREB, PIPEDA, BC PIPA, GDPR; consent flow; gender-neutral language and trilingual commitments; phase distinction (playtester now, research subject post-BREB)
- [PRODUCTION.md](PRODUCTION.md) — components inventory, materials and substrate, source-file locations, trilingual localisation workflow, IP and licensing, framework-template flow
- [PLAYTESTING.md](PLAYTESTING.md) — facilitation protocol, session structure, recruitment, materials per session, consent at the table, observation method, debrief
- [ROADMAP.md](ROADMAP.md) — open work: gaps, queued milestones (including BREB filing summer 2026), v2 components, deferred decisions

This set is the boardgame counterpart to the videogame documentation at `/var/www/play.journeyways.ca/docs/`. The two sets share an organising approach (numbered sections, transparent gap-disclosure, cross-references, document-control footer) but differ in substance: the videogame docs describe a Node.js application and its data layer; these docs describe a physical research instrument and the human processes around it.

**Canonical location.** This folder, in the `Academia` Obsidian vault, is the source of truth. A public mirror is served from `https://www.journeyways.ca/docs/boardgame/` (the marketing-site repo at `/var/www/www.journeyways.ca/docs/boardgame/`). When updating, edit the vault copy and then sync the marketing-site mirror.

The upstream design dossier — proposal, interview, game-materials inventory, bibliography — lives one level up at `~/apps/obsidian/Academia/Journeyways/Foundations/`. These governance documents reference Foundations rather than duplicating its content.

The marketing-facing surface lives at <https://www.journeyways.ca>; the digital companion is at <https://play.journeyways.ca>.
