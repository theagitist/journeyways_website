---
tags: [journeyways, game-design-notes, project-planning]
---

# Data governance and materials custody

This document describes how the JOURNEYWAYS boardgame project governs the research materials it generates: how those materials are classified, how they move from a session to long-term storage, what controls protect them from drift, loss, or unauthorised access, who is allowed to handle them, and what trail those handlings leave. It is the operational counterpart to [PRIVACY.md](PRIVACY.md) (the participant-rights view) and [COMPLIANCE.md](COMPLIANCE.md) (the framework-mapping view). The technical-control section that would be a separate SECURITY.md in a software project is **folded into [§5 Custody of materials](#5-custody-of-materials)** because the boardgame's "technical controls" are physical-custody and encryption controls, and there isn't enough surface to merit a standalone document.

Claims here are anchored to sibling documents, to named source files under `~/FileShare/jw/`, or to the rulebook PDF at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Rulebook.pdf>. Items marked **planned** describe states that activate after UBC BREB approval (filing planned summer 2026).

## 1. Scope

This document covers governance over the project's research materials: how materials are shaped at intake, how they move through the project, how they are protected from corruption or loss, who is allowed to handle them, and what record those handlings leave. The phase distinction in [COMPLIANCE.md §2](COMPLIANCE.md#2-phase-distinction-load-bearing-for-everything-below) governs which classes of material exist; this document specifies the per-class controls.

## 2. Data classification

Three sensitivity tiers, used to motivate the controls in the rest of this document:

| Tier | Examples | Treatment |
|---|---|---|
| **A. Highly sensitive** | Photographs of identifiable participants; signed consent and waiver documents; pseudonym-to-real-name mapping (research phase, planned); audio recordings (planned); completed retained booklets (research phase, planned) | Encrypted at rest; physical originals in locked storage; access strictly gated to the researcher and named collaborators; never published in raw form |
| **B. Moderately sensitive** | Written observation notes with in-session pseudonyms; session logistics records; photographs of game-state-only (no participants); demographic intake forms (planned) | Encrypted at rest in the researcher's notes archive; visible to the researcher and named research collaborators only; published only as anonymised excerpts |
| **C. Low sensitivity** | The published rulebook PDF, the player booklet PDF, card content, tile artwork, design notes, framework templates, public documentation (this file and its siblings) | Public by intent; managed in version control or on the marketing site; no special protections beyond standard file-system hygiene |

The classification is informal but consistent across this document, [PRIVACY.md](PRIVACY.md), and [COMPLIANCE.md](COMPLIANCE.md).

## 3. Materials inventory

The physical and digital materials the project handles, grouped by lifecycle role.

### 3.1 Game-content materials (Tier C)

- **Rulebook PDF.** Source layout in `~/FileShare/jw/game materials/Rulebook/` (filename TBC). Published PDF at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Rulebook.pdf>.
- **Player booklet PDF.** Source layout in `~/FileShare/jw/game materials/Player Booklet/`. Published PDF at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Player%20Booklet.pdf>.
- **Card content.** 81 cards across five categories (Red / Encounters, Blue / Reflections, Green / Movement, Black / Countdown, Purple / Group). Source files in `~/FileShare/jw/game materials/Cards/`. Inventory and sample content in `~/apps/obsidian/Academia/Journeyways/Foundations/game-materials.md`.
- **Map tiles.** 35 tiles in v1.0. Source artwork in `~/FileShare/jw/game materials/Map Tiles/`.
- **Asset library.** Decorative watercolor textures and substrates in `~/FileShare/jw/game materials/assorted/` and `Cards/card backgrounds/`. Some backgrounds use Adobe Firefly textures; card prompts and tile concepts are human-authored. See [PRODUCTION.md §6](PRODUCTION.md#6-ip-and-licensing) and `Foundations/proposal-summary.md` ("A note on AI-generated assets").
- **Framework templates.** **Planned**. Downloadable templates for player-authored variants; will be published on the marketing site. See [PRODUCTION.md §7](PRODUCTION.md#7-framework-templates-planned).

### 3.2 Session-derived materials (Tier A or B depending on item)

- **Photographs taken under the photo waiver** (Tier A if identifiable participants are visible, B if game-state-only). See [PRIVACY.md §3.1](PRIVACY.md#31-photographs).
- **Written observation notes** (Tier B). See [PRIVACY.md §3.2](PRIVACY.md#32-written-observation-notes).
- **Signed waivers and consent documents** (Tier A). See [PRIVACY.md §3.4](PRIVACY.md#34-signed-waivers-and-consent-documents).
- **Session logistics records** (Tier B). See [PRIVACY.md §3.5](PRIVACY.md#35-session-logistics-records).

### 3.3 Research-phase additions (planned, Tier A)

Once BREB approval is in place, the inventory grows. None of these are collected today; see [PRIVACY.md §3.6](PRIVACY.md#36-research-phase-additions-planned):

- Audio recordings (Tier A).
- Audio transcripts (Tier A; Tier B after anonymisation pass).
- Completed retained player booklets (Tier A).
- Pseudonym-to-real-name mapping (Tier A; held under stricter controls).
- Post-session interview transcripts (Tier A).
- Demographic intake forms (Tier B, scoped to the specific session).

### 3.4 Project-administration materials (Tier C)

- The governance documents in this folder (`Boardgame Specific/Documentation/`).
- The upstream design dossier in `Foundations/`.
- Project planning notes, roadmap drafts, correspondence with the BREB office, drafts of grant applications.

## 4. Data lifecycle

### 4.1 Playtesting-phase data classes (current)

The lifecycle of each class from intake to long-term state:

| Class | Intake | Processing | Long-term state | Triggered destruction |
|---|---|---|---|---|
| Photographs (waivered) | Captured at session on researcher's device | Transferred to encrypted local storage within 48 h; cloud auto-sync disabled; cataloged by session date and waiver scope | Retained on encrypted local store and encrypted external backup | On participant request (any time) |
| Written observation notes | Handwritten at session | Digitised to encrypted text file within 48 h; paper original retained in locked drawer or shredded | Retained in encrypted notes archive | On participant request, for specific references |
| Signed waivers | Signed on paper at session | Scanned to encrypted PDF; original filed in locked storage | Retained for project duration + 5 years post-publication per UBC / TCPS 2 norms | Per institutional schedule |
| Session logistics records | Written or typed alongside notes | Filed with observation notes | Retained for project duration | Project closeout |
| Player booklets | Used at session, **taken home by player** | n/a (the player keeps them) | Not retained by the researcher | n/a |

### 4.2 Research-phase data classes (planned)

Activates after BREB approval. Retention schedules and access controls will be specified in the BREB submission and finalised there. The shape:

| Class | Intake | Processing | Long-term state |
|---|---|---|---|
| Photographs (combined waiver) | Captured at session, same custody chain as playtesting-phase photographs | Same as above | Per BREB-approved schedule |
| Audio recordings | Captured at session on a dedicated recorder | Transferred to encrypted local storage immediately after session; transcribed (manually or with a privacy-respecting tool) within a defined window; anonymisation pass applied to transcript | Originals and anonymised transcripts retained per BREB-approved schedule |
| Retained completed booklets | Collected at end of session | Cataloged by participant pseudonym; pseudonym-to-real-name mapping held separately | Per BREB-approved schedule |
| Post-session interview transcripts | Created from audio recordings of interviews | Transcribed, anonymised | Per BREB-approved schedule |
| Demographic intake forms | Captured at session | Filed alongside session record, scoped to that session | Per BREB-approved schedule; never aggregated to a standing profile |

Specific retention windows ("X years post-publication", "destroyed after Y") will be set when the BREB protocol is filed.

## 5. Custody of materials

This section folds in what would otherwise be a standalone SECURITY.md document. Because the boardgame's "technical surface" is the researcher's devices and physical custody of paper materials, the surface is small enough to live as a section here.

### 5.1 Researcher device hygiene

- The researcher's primary working device runs full-disk encryption (FileVault on macOS / LUKS on Linux, whichever applies).
- The device requires a strong passphrase to unlock; the passphrase is held only by the researcher.
- The device sleeps with screen lock after a short inactivity window.
- Operating-system and application security updates are applied promptly.
- The device's automatic cloud sync (iCloud Photos, Google Photos, OneDrive, etc.) is configured to **not** include the project's session-data directories. Photographs taken on the device's camera are moved off the camera-roll into the encrypted project directory promptly, then deleted from the camera-roll.
- No third-party sync service is configured to mirror the project directories.

### 5.2 Encrypted storage layout

Session-derived materials live under an encrypted project directory on the researcher's working device (path TBC; flagged in [ROADMAP.md](ROADMAP.md) for canonicalisation). The directory structure, by convention:

```
<encrypted project root>/
├── sessions/
│   ├── <YYYY-MM-DD>-<short-venue-tag>/
│   │   ├── photos/              # waivered photographs
│   │   ├── notes/               # digitised observation notes
│   │   ├── waivers/             # scanned signed waivers
│   │   ├── logistics/           # attendance and accommodations
│   │   └── (research phase) audio/ transcripts/ booklets/
│   └── ...
├── waivers-archive/             # consolidated archive of all signed waivers
└── pseudonym-mapping/           # (research phase) held under stricter controls
```

The exact path is operator-private and not echoed in this document.

### 5.3 Physical storage

- Original signed waivers (paper) are kept in a locked drawer or filing cabinet at the researcher's residence.
- Original handwritten observation notes are either retained in the same locked storage or shredded after digitisation, at the researcher's discretion per session.
- Player booklets retained in the research phase will be kept in the same locked storage, with each booklet identified by its participant pseudonym (the pseudonym-to-name mapping is stored separately and digitally, encrypted).
- Keys to the locked storage are held only by the researcher.

### 5.4 Backups

- Encrypted backups of the project directory are written to a separate encrypted external drive at intervals (see [§7](#7-backups-and-recovery)).
- The external drive is kept physically separate from the working device (different room, or off-site if appropriate).
- The backup encryption key is held by the researcher in a password manager.

### 5.5 Password and key custody

- The researcher uses a reputable password manager for all project-related credentials (device encryption recovery key, backup-drive encryption key, mail account for project correspondence, marketing-site SSH key, etc.).
- The password-manager master password is strong and held only by the researcher.
- No project credential is shared by an unencrypted channel (email body, plain chat, paper).

### 5.6 Transport

- Photographs and audio recordings (when active) are never transmitted by an unencrypted channel. Transfer between devices uses USB or a peer-to-peer encrypted protocol (e.g. AirDrop, Magic Wormhole) rather than email or unencrypted upload.
- Photographs of the table or of game state without identifiable participants may be shared more freely for project communication (e.g. between the researcher and a future research collaborator), but always over an authenticated channel.

### 5.7 Project documents (Tier C)

The governance documents in this folder, the marketing-site source, and the videogame source live in git repositories under version control. None of these contain Tier A or Tier B material. The repositories are subject to their own access controls (researcher's GitHub account; collaborators added explicitly).

## 6. Roles and authorisation governance

### 6.1 Researcher

The researcher (currently Adri M., a single person) is the sole custodian of all session-derived materials during the playtesting phase. The researcher decides what is captured, applies the custody-of-materials controls in [§5](#5-custody-of-materials), and is the named recipient of every participant request under [PRIVACY.md §7](PRIVACY.md#7-participant-rights-and-self-service).

### 6.2 BREB-approved research collaborators (planned)

In the research phase, additional collaborators may be added under the BREB-approved protocol. Each collaborator is named in the BREB submission, signs whatever confidentiality undertaking UBC requires, and is granted access only to the classes of material their role requires. There is no general "team account"; access is per-person.

### 6.3 UBC oversight

UBC BREB has the institutional authority to review project records as part of its oversight role. UBC GRSJ administrative reviewers and the project's supervisor have similar rights within their institutional roles. None of these reviewers receive routine copies; access is on request, bounded by their own institutional confidentiality obligations.

### 6.4 No public access to materials

Tier A and Tier B materials are never released publicly in raw form. Tier B materials may be quoted, anonymised, in publications; Tier A photographs are only published after cropping or blurring of faces, and only to the extent the waiver and consent permit.

## 7. Backups and recovery

The boardgame project's backup posture is small but explicit:

- **Working device.** Encrypted at rest. Automatic OS-level backups (Time Machine on macOS / equivalent on Linux) may be configured, on the condition that they target the same encrypted external drive used for project backups, or another encrypted destination under researcher control.
- **Project directory backup.** Periodic encrypted copy to a separate encrypted external drive, kept physically separate from the working device.
- **Cloud backups.** **Not used** for Tier A or Tier B material. Tier C material lives in cloud-backed repositories (git, marketing-site repository) as part of normal version control; that is appropriate for public material.
- **Recovery.** In the event of working-device loss, the researcher restores from the encrypted external drive. Decryption keys are held in the password manager.

A formal backup schedule (weekly? after each session?) and an off-site offline backup variant are planned. See [ROADMAP.md](ROADMAP.md).

## 8. Data residency

All materials handled by the boardgame project are physically located in Canada by a researcher resident in Canada, on Canadian-resident encrypted storage. There is no automatic cross-border replication. This residency posture is a deliberate alignment with TCPS 2 expectations and with UBC's institutional norms; see [COMPLIANCE.md §7](COMPLIANCE.md#7-data-residency).

Cloud-backed Tier C material (this documentation, the marketing-site repository, the videogame repository) is hosted by providers whose data-handling policies govern that hosting. Those are documented in the respective project infrastructure documents.

## 9. Schema-of-research-data change process

There is no formal "schema" for physical research materials, but there is a controlled vocabulary that needs to stay stable for analysis to be possible:

- **In-session pseudonym convention.** First-name initial or participant code per session. Changes to this convention should not break existing notes, so any change is additive (a new column or new convention runs alongside the old).
- **Filing structure under `sessions/<YYYY-MM-DD>-<venue>/`** as documented in [§5.2](#52-encrypted-storage-layout). Renaming or restructuring this layout is a deliberate operation; it should be recorded in a session-log file at the project root so the historical trail is preserved.

For the digital game-content materials (rulebook layout, card layouts, tile artworks), version control in `~/FileShare/jw/` plus the published PDFs are the schema of record. Changes happen as part of v2 work; see [PRODUCTION.md](PRODUCTION.md).

## 10. Known gaps

Documented here for transparency. Each maps to an entry in [ROADMAP.md](ROADMAP.md).

### 10.1 No BREB protocol active yet

This document describes the **playtesting-phase** posture as canonical and the research-phase additions as **planned**. Research-phase retention windows, access controls, and the formal data-handling protocol will be set in the BREB submission. Until BREB approval, those sections describe intent rather than active policy.

### 10.2 No automated DLP scanner over notes

The researcher's discipline (in-session pseudonyms, redaction on request) is the only mechanism preventing a real name from accidentally appearing in observation notes. An automated scan would be possible but is not in scope for a project of this size.

### 10.3 Backup schedule not yet codified

The project performs encrypted backups, but the schedule is currently "on cadence" rather than codified. A formal schedule (weekly + after each session) will be set when the BREB submission requires it.

### 10.4 No third-party custody audit

No external auditor reviews the custody-of-materials posture. This is normal for a small UBC research project; UBC BREB oversight is the institutional check.

## 11. Verification

To verify the claims in this document, a reader can:

1. Read [PRIVACY.md](PRIVACY.md) for the per-class participant-rights view, [COMPLIANCE.md](COMPLIANCE.md) for the framework mapping, and [PLAYTESTING.md](PLAYTESTING.md) for the session-level mechanics.
2. Inspect the published rulebook and player booklet at <https://www.journeyways.ca/download/>.
3. Inspect the photo waiver (on file with the researcher; will accompany the BREB submission).
4. Once BREB approves the research protocol, inspect the approved informed consent form, the combined photo-and-audio waiver, and the BREB-approved retention schedule.
5. Inspect the source-file inventory under `~/FileShare/jw/game materials/` (researcher's local machine; not part of any public repository).

## 12. Document control

| Field | Value |
|---|---|
| Game version | v1.0 (playtest edition) |
| Document version | 1.0 |
| Last reviewed | 2026-05-12 |
| Owner | Adri M. |
| Sibling documents | `COMPLIANCE.md`, `PRIVACY.md`, `PRODUCTION.md`, `PLAYTESTING.md`, `ROADMAP.md` |
