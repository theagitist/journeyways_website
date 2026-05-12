---
tags: [journeyways, game-design-notes, project-planning]
---

# Roadmap and open work (boardgame)

This document is the single index of everything that is committed to do, queued, or explicitly deferred in the JOURNEYWAYS **boardgame** project. Each entry is a short summary with a status tag and, where the canonical detail lives in another file, a link to that detail. Items are grouped by topic, since a reader almost always arrives with a topic in mind rather than a "what is coming up next" question.

## 1. Scope

- This file is canonical for the existence of any open item on the boardgame side. New TODOs identified during work should land here first, then get linked detail when the corresponding domain doc is updated.
- Where a domain doc owns the full prose for an item (most commonly [COMPLIANCE.md §9](COMPLIANCE.md#9-known-gaps) or [PRODUCTION.md §11](PRODUCTION.md#11-known-gaps)), the entry here is one line plus a link. Detail is not duplicated; that prevents drift.
- The videogame's own roadmap lives at `/var/www/play.journeyways.ca/docs/ROADMAP.md`; items that span both surfaces (e.g. brand-spec changes, framework templates intended for both physical and digital authoring) are referenced from both roadmaps.
- Items intended for public communication on the marketing site flow from this document into the "Roadmap" section of `boardgame.html` on <https://www.journeyways.ca>, in audience-friendly language. Items concerning unfinalised commercial relationships (print partners, distribution) stay here only until they are public.

**Status tags:**

- `in progress` — actively being worked on
- `queued` — committed, expected within the next handful of work sessions
- `queued (when X)` — committed, but starting on a defined trigger
- `backlog` — intended but not committed to a schedule
- `won't do` — explicit decision not to pursue, kept here for transparency

## 2. Research ethics

- **UBC BREB filing** — `queued (summer 2026)`. Formal Behavioural Research Ethics Board submission for the JOURNEYWAYS research protocol. Covers: combined photo-and-audio waiver, informed consent form, retention schedule for audio recordings and retained booklets, withdrawal mechanics and window, anonymisation policy, demographic intake handling, and the named research team. Activates everything currently described as **planned** across [COMPLIANCE.md](COMPLIANCE.md), [PRIVACY.md](PRIVACY.md), [DATA_GOVERNANCE.md](DATA_GOVERNANCE.md), and [PLAYTESTING.md §6](PLAYTESTING.md#6-research-phase-additions-planned).
- **Combined photo-and-audio waiver** — `queued (with BREB filing)`. Replaces the standalone photo waiver when audio recording begins. See [COMPLIANCE.md §3.3](COMPLIANCE.md#33-audio-waiver-planned).
- **Informed consent form** — `queued (with BREB filing)`. UBC BREB approval is the trigger; until then, the playtesting-phase consent flow (verbal opening + photo waiver) is the active mechanism. See [COMPLIANCE.md §3.2](COMPLIANCE.md#32-research-data-collection-phase-planned-post-breb).
- **Withdrawal window codification** — `queued (with BREB filing)`. The two-week planned default in [PRIVACY.md §7.3](PRIVACY.md#73-erasure--redaction) is confirmed (or replaced) in the BREB submission.
- **Recruitment protocol for the research phase** — `queued (with BREB filing)`. See [PLAYTESTING.md §10.4](PLAYTESTING.md#104-recruitment-protocol-for-the-research-phase-tbc).

## 3. Documentation and protocols

- **Photo waiver canonical filename** — `queued`. The photo waiver is in active use, but its canonical filename under `~/FileShare/jw/` is pending canonicalisation. Listed in [COMPLIANCE.md §9.2](COMPLIANCE.md#92-photo-waiver-source-of-truth-file-not-yet-canonicalised).
- **Facilitator script** — `queued`. The verbal opening in [PLAYTESTING.md §4.2](PLAYTESTING.md#42-verbal-opening-10-min) is the working script; a canonical facilitator script document is queued so future facilitators work from the same source. See [PLAYTESTING.md §10.3](PLAYTESTING.md#103-facilitator-script-not-yet-canonicalised).
- **Third playtest details** — `queued`. [PLAYTESTING.md §2](PLAYTESTING.md#2-sessions-held-to-date) names two of three; the third (venue, date, cohort) needs to be filled in.
- **Public docs serving** — `queued`. Mirror the contents of `~/apps/obsidian/Academia/Journeyways/Boardgame Specific/Documentation/` to `/var/www/www.journeyways.ca/docs/boardgame/` and serve publicly. Pattern follows the marketing site's `brand-spec.md` exception in the per-site nginx config (see `/var/www/www.journeyways.ca/CLAUDE.md` for the existing pattern). Pairs with the videogame's own queued doc-serving route in `/var/www/play.journeyways.ca/docs/ROADMAP.md §4`.
- **Source-file inventory canonicalisation** — `queued`. Confirm the layout under `~/FileShare/jw/game materials/` and update the references in [PRODUCTION.md §8](PRODUCTION.md#8-source-files-and-version-control). See [PRODUCTION.md §11.5](PRODUCTION.md#115-source-file-inventory-under-fileshare-jw-not-fully-canonicalised).
- **Versioning convention for derivative variants** — `backlog`. The framework-variant version namespace ([PRODUCTION.md §10](PRODUCTION.md#10-versioning)) needs a small policy: how community-authored variants are versioned, how they link back to the canonical v1 / v2 line, how the curated community library tags them.

## 4. Production and materials (v1.0)

- **Print partner selection** — `queued`. Evaluate Canadian (preferred) and partnership-of-record candidates for v1.0 small-batch production. Criteria in [PRODUCTION.md §5](PRODUCTION.md#5-print-and-manufacturing-partners).
- **Substrate decisions** — `queued (before first manufactured copy)`. Card stock weight and finish; tile material (wooden vs cardboard); booklet paper and binding. See [PRODUCTION.md §3](PRODUCTION.md#3-print-and-materials) and §11.2.
- **Packaging design** — `queued (before first manufactured copy)`. The current playtest sets use functional packaging. A shipping-ready box design is needed alongside v2 work. See [PRODUCTION.md §2.6](PRODUCTION.md#26-packaging).
- **Distribution model for v1.0** — `queued`. Direct-to-cohort? Print-on-demand? Partnership with an educational distributor? See [PRODUCTION.md §9](PRODUCTION.md#9-distribution).
- **Print-and-play track** — `backlog`. Home-printable PDFs for cards and tiles sized for at-home assembly, separate from the manufactured copies. This is the most accessible distribution for the framework once the licensing is finalised. See [PRODUCTION.md §9](PRODUCTION.md#9-distribution).

## 5. v2 game content

The most-requested or most-promising additions surfaced through the three playtests held to date. Detail and rationale in `~/apps/obsidian/Academia/Journeyways/Foundations/proposal-summary.md` ("Roadmap").

- **More Purple (Group) cards** — `queued (v2)`. The most-requested expansion by playtesters. Cross-player interaction prompts.
- **More Red (Encounter) variety** — `queued (v2)`. Broaden the evocative identity-prompt range.
- **Card-type rebalancing** — `queued (v2)`. Adjust per-pile counts based on playtest observations.
- **Incorporation of user-created tiles** — `queued (v2)`. Tiles surfaced by players during playtests that proved generative make it into the canonical 35-tile set (or expand the set).
- **Quick Reference card** — `backlog`. A table-side summary card that condenses the rules for the facilitator and for returning players. See [COMPLIANCE.md §5.3](COMPLIANCE.md#53-physical-accessibility) under "Cognitive accessibility".
- **Migrant identities variant** — `backlog`. Adri may author this variant; closes the proposal's audience gap.
- **Children / younger players variant** — `backlog`. Externally requested; requires a separate BREB protocol if research data is to be collected. See [COMPLIANCE.md §4.6](COMPLIANCE.md#46-adults-only-research-scope).

## 6. Framework and community

- **Framework templates** — `queued`. Card template, tile template, rulebook template, player-booklet template, all editable for player-authored variants. Working candidate authoring tool: Typst (aligned with the videogame's queued Typst toolchain at `/var/www/play.journeyways.ca/docs/ROADMAP.md §4`). See [PRODUCTION.md §7](PRODUCTION.md#7-framework-templates-planned).
- **Community library of variants** — `backlog`. Curated space for player-authored variants, under guidelines (two-tier governance: framework open, library curated). Pairs with the framework-templates work above. Goes live when the templates ship and a small initial set of variants exists.
- **Licensing finalisation** — `queued (before public distribution)`. Choose specific Creative Commons variant for content; choose specific software licence for the videogame (the videogame project tracks its own licence decision). See [PRODUCTION.md §6](PRODUCTION.md#6-ip-and-licensing).

## 7. Trilingual launch

- **French and Spanish manual translation pass** — `queued`. Rulebook, player booklet, and the 81 cards, in that order. Native-speaker proofing each language. See [PRODUCTION.md §4](PRODUCTION.md#4-localisation-trilingual).
- **Gender-neutral language audit on Spanish translation** — `queued (with the Spanish pass)`. Spanish gendered grammar requires explicit attention. See [COMPLIANCE.md §5.2](COMPLIANCE.md#52-gender-neutral-language).
- **Per-language production model decision** — `queued (with print-partner selection)`. Single-language sets versus combined trilingual sets. See [PRODUCTION.md §4](PRODUCTION.md#4-localisation-trilingual).
- **Trilingual marketing-site content** — `backlog`. The marketing site at <https://www.journeyways.ca> is currently English-only. Trilingual content lands alongside the wider trilingual launch.

## 8. Accessibility

- **Palette distinguishability audit** — `queued`. Formal check that the five pile colours (Red, Blue, Green, Black, Purple) are distinguishable across common colour-vision deficiencies. The category-name printing already provides a non-colour identifier; the audit confirms or refines the palette itself. See [COMPLIANCE.md §5.3](COMPLIANCE.md#53-physical-accessibility) and §9.4.
- **Typography audit on cards and booklet** — `queued`. Confirm point sizes for body, prompt, and label text against legibility norms. Goes alongside the substrate decisions in [§4](#4-production-and-materials-v10).
- **Session-environment checklist** — `backlog`. A short pre-session checklist for facilitators covering wheelchair access, step-free entry, lighting, sensory considerations, and per-participant accommodations.
- **Print-derivative typography alignment** — `backlog`. Confirm that the marketing-site brand spec at <https://www.journeyways.ca/brand-spec.md> covers print derivatives explicitly (Italianno legibility floor, Inter for body) and update the spec if any rule is print-specific. Cross-references the videogame project, whose UI shares the same brand spec.

## 9. Materials custody

- **Codified backup schedule** — `queued`. The current "on cadence" backup approach in [DATA_GOVERNANCE.md §7](DATA_GOVERNANCE.md#7-backups-and-recovery) is replaced by a written schedule (weekly + after each session). Required by the BREB submission.
- **Off-site offline backup** — `backlog`. A second encrypted backup target held physically off-site for disaster recovery.
- **Encrypted project directory path canonicalisation** — `queued`. [DATA_GOVERNANCE.md §5.2](DATA_GOVERNANCE.md#52-encrypted-storage-layout) describes a structure; the exact path on the researcher's device is operator-private but should be canonical and documented in a non-public operator note.

## 10. Project trajectory

Items here describe the project's research and audience trajectory rather than specific tasks. They surface on the marketing site's Roadmap section in audience-facing form.

- **First research-phase session** — `queued (after BREB approval)`. Activates the research-phase posture across all docs. Cohort size, venue, and recruitment per the BREB submission.
- **Public release of framework templates** — `queued (after templates draft and licensing finalisation)`.
- **Larger play sessions, post-BREB** — `backlog`. Progressively larger play cohorts as the research phase opens up. No splash launch.
- **Hybrid play** — `backlog`. Mixed-medium variant combining physical components (player booklet, board map) with the videogame. Vision-level direction shared with the videogame's own ROADMAP at `/var/www/play.journeyways.ca/docs/ROADMAP.md §6`.
- **Project completion horizon** — `backlog`. Roughly 2027 to 2028 (one to two years from May 2026), per `Foundations/proposal-summary.md` ("Roadmap").

## 11. Explicitly not doing

- **Audio recording during the playtesting phase** — `won't do` (until BREB filing). Audio recording activates with the combined photo-and-audio waiver, which is tied to the BREB submission.
- **Generative-AI card prompts, card content, or tile concepts** — `won't do`. Card and tile content is human-authored. Decorative watercolour textures may use Adobe Firefly under its commercial-use terms; the distinction is documented in [PRODUCTION.md §6.4](PRODUCTION.md#64-watercolour-backgrounds-adobe-firefly) and in `Foundations/proposal-summary.md` ("A note on AI-generated assets").
- **Machine translation of card content** — `won't do`. French and Spanish translations are done manually by humans; player-authored content is never auto-translated. See [PRODUCTION.md §4](PRODUCTION.md#4-localisation-trilingual) and [COMPLIANCE.md §5.1](COMPLIANCE.md#51-trilingual-shipping).
- **Standing online participant profile** — `won't do`. The project does not maintain a database of participants across sessions; each session's records sit with that session. See [PRIVACY.md §6.3](PRIVACY.md#6-data-minimisation-choices).
- **Cloud-backed Tier A or Tier B material** — `won't do`. Photographs, observation notes, signed waivers, and (planned) audio recordings and retained booklets live only on encrypted local storage. See [DATA_GOVERNANCE.md §7](DATA_GOVERNANCE.md#7-backups-and-recovery).

## 12. Document control

| Field | Value |
|---|---|
| Game version | v1.0 (playtest edition) |
| Document version | 1.0 |
| Last reviewed | 2026-05-12 |
| Owner | Adri M. |
| Sibling documents | `COMPLIANCE.md`, `PRIVACY.md`, `DATA_GOVERNANCE.md`, `PRODUCTION.md`, `PLAYTESTING.md` |
