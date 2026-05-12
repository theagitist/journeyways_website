---
tags: [journeyways, game-design-notes, project-planning]
---

# Compliance and ethical commitments

This document maps the JOURNEYWAYS boardgame project's research practices, materials custody, and design choices to the regulatory and ethical frameworks that apply to it as an academic research instrument developed at the University of British Columbia. It is the cross-reference companion to [PRIVACY.md](PRIVACY.md) (what is done with participant materials), [DATA_GOVERNANCE.md](DATA_GOVERNANCE.md) (operational rules and custody), [PRODUCTION.md](PRODUCTION.md) (how the physical materials are made and distributed), and [PLAYTESTING.md](PLAYTESTING.md) (how sessions are conducted).

Claims in this document are anchored to specific sections in sibling documents, named source files in `~/FileShare/jw/`, or pages of the rulebook PDF served at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Rulebook.pdf>. Where a claim concerns a planned state that is not yet active, it is marked explicitly as **planned** and tied to an entry in [ROADMAP.md](ROADMAP.md).

## 1. Scope

This document does **not** make legal claims of formal certification. It documents how the boardgame project's design and conduct align with the privacy, research-ethics, and accessibility frameworks that apply to it as a small academic research project at UBC. The mapping is intended for ethics-review boards, prospective participants, funders, collaborators, and any reader interested in the project's posture against external standards.

The frameworks considered here are:

- **TCPS 2** — Tri-Council Policy Statement: Ethical Conduct for Research Involving Humans (Canadian research-ethics policy). The primary frame for this project.
- **UBC BREB** — University of British Columbia Behavioural Research Ethics Board, the institutional body that will review the formal research protocols once filed.
- **PIPEDA** — Personal Information Protection and Electronic Documents Act (Canadian federal private-sector privacy law). Applies to any personal information collected during sessions and retained.
- **BC PIPA** — Personal Information Protection Act (British Columbia private-sector privacy law). Provincial analogue, applies in the same way.
- **GDPR** — General Data Protection Regulation (EU). Applicable insofar as European residents may participate in future sessions.
- **WCAG 2.1 AA** — Web Content Accessibility Guidelines. Applicable only to the marketing site at <https://www.journeyways.ca> and the videogame at <https://play.journeyways.ca>, not to the physical materials themselves. Physical accessibility is covered separately in [§5](#5-language-and-accessibility).

## 2. Phase distinction (load-bearing for everything below)

This project has two phases, and the compliance posture differs materially between them. Every section in this document should be read with this distinction in mind.

| Phase | Status | Participants are... | Materials are... |
|---|---|---|---|
| **Playtesting** (current) | Active. Three structured playtests completed to date | **Playtesters**, not research subjects. They consent to play and to be photographed under the photo waiver. No interview or journal retention. | Used to refine the game. Photos kept under the waiver. Written observation notes retained for design iteration, not for research analysis. |
| **Research data collection** (planned) | Pending UBC BREB approval; filing planned for **summer 2026** | **Research subjects** under formal informed consent. | Subject to a formal data-handling protocol: completed booklets retained by the researcher, anonymised, used for thematic analysis. |

Until BREB approval is granted, the project does not collect research-grade data. The vocabulary, the consent forms, and the retention rules are different in each phase. This document describes the current playtesting posture as canonical, with the planned research-phase posture documented as **planned** and tied to [ROADMAP.md](ROADMAP.md). See also the Foundations note at `~/apps/obsidian/Academia/Journeyways/Foundations/proposal-summary.md` ("Methodology") for the methodological framing of this distinction.

## 3. Lawful basis and consent

The lawful basis for processing personal information collected during sessions is **explicit consent**, captured before each session begins. The mechanism differs by phase:

### 3.1 Playtesting phase (current)

- **Photo waiver.** A written photo consent form is presented and signed before any photographs are taken during a playtest session. Participants who decline are not photographed. Canonical form: `~/FileShare/jw/game materials/[photo-waiver-filename]` (filename TBC; flagged in [ROADMAP.md](ROADMAP.md) for canonicalisation).
- **Verbal acknowledgement of voluntariness.** The facilitator opens each session by stating that participation is voluntary, that any player can leave at any time without explanation or penalty, and that the facilitator will keep written observation notes to improve the game.
- **No audio recording.** Audio is not captured in any current playtest. A combined photo and audio waiver is **planned** for the moment audio recording begins (see [§3.3](#33-audio-waiver-planned) and [ROADMAP.md](ROADMAP.md)).
- **No booklet retention.** Player booklets remain with players at the end of playtesting sessions; the researcher may photograph specific pages with verbal consent for design reference, governed by the same photo waiver.

### 3.2 Research data collection phase (planned, post-BREB)

- **Written informed consent**, in the form approved by UBC BREB. Captured before a session begins and signed by every participant. The form will state explicitly that completed player booklets will be retained by the researcher as part of the research data set, and that the participant therefore receives no take-home copy of the booklet (see [§4](#4-research-ethics-alignment) and [PRIVACY.md §4](PRIVACY.md#4-data-inventory)).
- **Combined photo and audio waiver**, as the activation of audio recording during research-grade sessions coincides with the BREB protocol.
- **Right to withdraw**, exercised either during the session (the participant leaves, all of their materials are removed from the research record and destroyed) or after the session (the participant contacts the researcher within a defined window; their materials are anonymised, partially excluded, or destroyed depending on what they ask).

### 3.3 Audio waiver (planned)

When audio recording is introduced (coinciding with the research-data-collection phase), the existing photo waiver is replaced by a **combined photo and audio waiver**. The document will explicitly: (a) state which recording devices are used, (b) describe where audio files are stored and for how long, (c) describe who has access, (d) describe the anonymisation and transcription workflow, (e) state the participant's right to request a copy, redaction, or destruction of any audio recording they appear in. Queued in [ROADMAP.md](ROADMAP.md).

## 4. Research-ethics alignment (TCPS 2 and UBC BREB)

The project is a small academic research project conducted at UBC GRSJ. TCPS 2 is the relevant Canadian research-ethics policy; UBC BREB is the institutional reviewer.

### 4.1 Free and informed consent (TCPS 2 Article 3)

- During the **playtesting phase**, consent is obtained for the photographable and observable aspects of the session only. The verbal opening explains the project's purpose, what the facilitator will and will not record, and the participant's right to withdraw without penalty at any time.
- During the **research data collection phase**, consent is captured in writing in the BREB-approved form. The form is read aloud or made available in advance; participants sign before any data-generating activity begins.
- **Right to withdraw** is exercised without penalty in both phases. In the research phase, withdrawal mechanics and a withdrawal window are documented in the consent form.

### 4.2 Privacy and confidentiality (TCPS 2 Article 5)

- Personal information collected during sessions is minimised: see [PRIVACY.md §6](PRIVACY.md#6-data-minimisation-choices).
- Photographs taken under the waiver are stored only on the researcher's encrypted personal devices; see [DATA_GOVERNANCE.md §5](DATA_GOVERNANCE.md#5-custody-of-materials).
- Written observation notes refer to participants by an in-session pseudonym (typically a first-name initial or a participant code), never by full real name; see [PRIVACY.md §3.2](PRIVACY.md#32-written-observation-notes).
- Cross-border data transfer is not part of the boardgame project: materials are physical or held on local Canadian-resident devices.

### 4.3 Inclusion and avoidance of harm (TCPS 2 Article 4)

- **Gender-neutral language** is a project-wide commitment. Card prompts and tile labels avoid gendered constructions; see [§5.2](#52-gender-neutral-language).
- **Trilingual launch (English, French, Spanish)** reduces language-based exclusion; see [§5.1](#51-trilingual-shipping).
- **Default content is light-hearted, no sensitive or "hardcore" situations.** Adults-only by design; see [§4.6](#46-adults-only-research-scope).
- **Loose rules and multimodal expression** are deliberate inclusion mechanisms. The game is designed so that a player who chooses silence, drawing, or verbal narration is participating just as fully as one who writes; see `~/apps/obsidian/Academia/Journeyways/Foundations/proposal-summary.md` ("Design philosophy").

### 4.4 Use of research data in publication (planned, post-BREB)

All excerpts from journal content, player-created tiles, photographs, or facilitator observation notes used in academic output will be **anonymised before publication**. Specifically:

- Real names, locations, employers, family-member identifiers, and other directly identifying details that may appear in the booklet text or in dictated verbal narration will be redacted.
- Photographs of participants will not be published; if a photographed object or artefact is published, faces are cropped or blurred.
- Participants do not see their excerpts before publication; the anonymisation step is the safeguard.
- Players who do not wish to contribute to research output can participate in playtesting only, prior to BREB. Once the research phase opens, participation in a research-tagged session implies consent for anonymised quotation; participants who prefer not to be quoted are welcome at non-research playtests but are not enrolled as research subjects.

This policy will be made explicit on the consent form filed with UBC BREB.

### 4.5 Photo waiver

A written **photo waiver** is in active use for the playtesting phase. Source file: `~/FileShare/jw/game materials/[photo-waiver-filename]` (filename to be canonicalised; see [ROADMAP.md](ROADMAP.md)). Signed by every participant before any photograph is taken. Players who decline are not photographed and continue to participate normally. The waiver is replaced by a combined photo and audio waiver when audio recording is introduced; see [§3.3](#33-audio-waiver-planned).

### 4.6 Adults-only research scope

The current playtesting phase and the planned research phase are conducted with adult participants. A "children / younger players" variant has been requested by an external party and is on the framework roadmap as a player-authored variant, but it is **out of scope** for the current research project; if undertaken, a separate BREB filing and protocol would be required.

## 5. Language and accessibility

### 5.1 Trilingual shipping

JOURNEYWAYS is committed to a **trilingual launch (English, French, Spanish)** for the boardgame's official content. The rulebook, player booklet, and card prompts are authored in English first; French and Spanish translations are produced manually (no machine translation of card content) and proofed by native speakers. Implementation status, source-of-truth language, and the per-language plate-proofing workflow are documented in [PRODUCTION.md §4](PRODUCTION.md#4-localisation-trilingual).

Auto-translation of player-authored content (rules variants, custom tile names, etc.) is explicitly **not** performed; player content stays in its original language to preserve the player's agency over their own expression. This rule applies equally to playtest-derived feedback that is incorporated into v2: it is translated by a human, not by a model.

### 5.2 Gender-neutral language

Gender-neutral phrasing is a project-wide commitment, especially important in Spanish where gendered grammar is the default. Card prompts, tile names, rulebook copy, and facilitator scripts avoid gendered constructions. Where Spanish would default to a gendered form, the materials use gender-neutral alternatives. This is a content-curation discipline applied during authoring and translation rather than a code-enforced rule. The discipline applies to playtest-derived additions and to v2 content as well.

### 5.3 Physical accessibility

The physical materials introduce accessibility considerations specific to a boardgame:

- **Colour-coded card piles.** Five piles, named both by colour and by category (Red / Encounters, Blue / Reflections, Green / Movement, Black / Countdown, Purple / Group). Both the colour and the category name are printed on each card so that colour-blind players can identify a pile by name. The five colours are chosen for distinguishability across common colour-vision deficiencies; a formal audit of the palette is **planned** ([ROADMAP.md](ROADMAP.md)).
- **Card and booklet typography.** The rulebook and player booklet use a sans-serif typeface at a body size that prioritises legibility. Specific point sizes and the typeface choice are documented in [PRODUCTION.md §3](PRODUCTION.md#3-print-and-materials).
- **Tile materiality.** Tiles are designed to be tactile (the canonical material is wood or thick cardboard); the act of placing a solid piece is part of the expressive act and supports players who navigate by touch.
- **Cognitive accessibility.** The rules are intentionally light. The rulebook itself is short; the facilitator is the primary scaffolding for new players. A "Quick Reference" card summarising the table-side rules is **planned** ([ROADMAP.md](ROADMAP.md)).
- **Sensory considerations at the venue.** Sessions are held in quiet, low-stimulation rooms with predictable lighting. No flashing, no required audio. The facilitator script asks participants in advance about specific accommodations.
- **Multimodal expression.** Journaling is the default but not the requirement. Drawing, speaking, or silence are all valid ways to participate; see the Foundations design philosophy.

A formal physical-accessibility review (typography audit, palette audit, session-environment checklist) is queued in [ROADMAP.md](ROADMAP.md).

### 5.4 Marketing-site and videogame accessibility

For accessibility of the marketing site (<https://www.journeyways.ca>) and the videogame (<https://play.journeyways.ca>) — the digital surfaces that present the boardgame to the world — see the videogame `docs/COMPLIANCE.md §5` for WCAG 2.1 AA posture. The boardgame project incorporates those surfaces by reference rather than restating them.

## 6. Consent flow at a playtest session

The current (playtesting-phase) flow:

1. Arrival and informal introductions; the facilitator distributes a copy of the photo waiver and the session overview.
2. Verbal opening: the facilitator explains the session's purpose (refining the game), what the facilitator will and will not record (written observation notes; photographs only of consenting participants and of the game state on the table), and the participant's right to withdraw at any moment without penalty.
3. Signed photo waivers are collected from those participants who consent to being photographed. Participants who decline are not photographed.
4. The session proceeds. See [PLAYTESTING.md §4](PLAYTESTING.md#4-session-structure).
5. Closing debrief: the facilitator captures participant feedback verbally and in notes; no recording.

The planned **research-phase** flow adds: a printed copy of the BREB-approved informed consent form (presented in advance of the session where possible), a signed consent form on file before any data-generating activity, a combined photo and audio waiver, and a structured post-session interview. See [PLAYTESTING.md §6](PLAYTESTING.md#6-research-phase-additions-planned) for the planned changes.

## 7. Data residency

All materials collected during sessions are held on devices physically located in Canada by a researcher resident in Canada, on Canadian-resident encrypted storage. No automatic cross-border replication occurs. This residency posture is a deliberate alignment with TCPS 2 expectations and with UBC's institutional norms for research data in the social sciences. See [DATA_GOVERNANCE.md §6](DATA_GOVERNANCE.md#6-data-residency) for the per-material residency story.

The marketing site at <https://www.journeyways.ca> and the videogame at <https://play.journeyways.ca> have their own residency stories documented in their respective infrastructure documents.

## 8. Cross-document references

For the full implementation detail behind the rights and controls mapped above:

- **What participant data is collected and how participants control it**: [PRIVACY.md](PRIVACY.md).
- **Classification, chain of custody, retention, integrity, custody of materials**: [DATA_GOVERNANCE.md](DATA_GOVERNANCE.md).
- **How the physical materials are made and distributed**: [PRODUCTION.md](PRODUCTION.md).
- **How sessions are conducted**: [PLAYTESTING.md](PLAYTESTING.md).
- **Open work and queued milestones**: [ROADMAP.md](ROADMAP.md).

## 9. Known gaps

Documented here for transparency. Each is also tracked in [ROADMAP.md](ROADMAP.md).

### 9.1 No active BREB protocol yet

The project is currently in its **playtesting** phase. UBC BREB filing is planned for **summer 2026**. Until BREB approval is granted, the project does not collect research-grade data and the term "research participant" is not used. The current vocabulary is "playtester". Queued in [ROADMAP.md](ROADMAP.md).

### 9.2 Photo waiver source-of-truth file not yet canonicalised

A photo waiver is in use, but its canonical filename and storage location under `~/FileShare/jw/` are pending confirmation. Once canonicalised, this document and [PRIVACY.md](PRIVACY.md) will reference the exact filename. Queued in [ROADMAP.md](ROADMAP.md).

### 9.3 Combined photo and audio waiver not yet drafted

The audio waiver is needed in conjunction with the BREB filing; both are queued for summer 2026. Until drafted and adopted, no audio recording occurs at sessions.

### 9.4 No formal accessibility audit yet

Physical accessibility (palette distinguishability, typography point sizes, tile contrast, session-environment checklist) is approached as design discipline rather than as a formally audited property. A documented audit is queued in [ROADMAP.md](ROADMAP.md).

### 9.5 No formal certification

This document maps the project's design to external frameworks; the project does not hold any formal certification (TCPS 2 is a policy framework, not a certification). The mapping is for transparency, not for assertion of compliance.

## 10. Verification

To verify the claims in this document, a reader can:

1. Read [PRIVACY.md](PRIVACY.md), [DATA_GOVERNANCE.md](DATA_GOVERNANCE.md), [PRODUCTION.md](PRODUCTION.md), and [PLAYTESTING.md](PLAYTESTING.md) for the implementation detail behind each section above.
2. Read the rulebook PDF at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Rulebook.pdf> and the player booklet at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Player%20Booklet.pdf>.
3. Inspect the photo waiver, on file with the researcher (will be available with the BREB submission).
4. Once BREB has approved the protocol, inspect the approved informed consent form and the combined photo and audio waiver.
5. Read the upstream design dossier at `~/apps/obsidian/Academia/Journeyways/Foundations/` — particularly `proposal-summary.md` for the methodological framing.

## 11. Document control

| Field | Value |
|---|---|
| Game version | v1.0 (playtest edition) |
| Document version | 1.0 |
| Last reviewed | 2026-05-12 |
| Owner | Adri M. |
| Sibling documents | `PRIVACY.md`, `DATA_GOVERNANCE.md`, `PRODUCTION.md`, `PLAYTESTING.md`, `ROADMAP.md` |
