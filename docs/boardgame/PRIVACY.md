---
tags: [journeyways, game-design-notes, project-planning]
---

# Privacy and participant data

This document describes how the JOURNEYWAYS boardgame project handles personal information and participant-generated materials during in-person play sessions. It is the privacy companion to [COMPLIANCE.md](COMPLIANCE.md) (which maps the project to external frameworks) and [DATA_GOVERNANCE.md](DATA_GOVERNANCE.md) (which covers operational rules, custody, and retention). It is one of a set of project documents that support the website, the research process, and any reader who wants a more in-depth view of how the project handles people's information.

Claims in this document are anchored to sibling documents, to named source files under `~/FileShare/jw/`, or to pages of the rulebook PDF at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Rulebook.pdf>. Claims that describe a planned (post-BREB) state are marked **planned** and tied to [ROADMAP.md](ROADMAP.md).

## 1. Scope

This document covers personal information and participant-generated materials handled by the JOURNEYWAYS boardgame project: what is captured at sessions, where it lives, who can see it, how long it is kept, and what participants can do about it.

The phase distinction documented in [COMPLIANCE.md §2](COMPLIANCE.md#2-phase-distinction-load-bearing-for-everything-below) is load-bearing for this document: the **playtesting phase** (current) and the **research data collection phase** (planned, post-BREB filing in summer 2026) handle data differently. The current playtesting posture is described as canonical; the research-phase additions are described as **planned**.

The project is intended for adult participants in both phases. See [COMPLIANCE.md §4.6](COMPLIANCE.md#46-adults-only-research-scope).

## 2. What "personal data" means here

For the boardgame project, "personal data" is anything that identifies a participant, distinguishes one participant's contributions from another's, or could plausibly be linked to a real person. The list is shaped by what happens at a physical session, not by a database schema:

- **Identifying details**: real name, contact email or phone (only when needed to coordinate a session), city of residence (only when relevant to recruitment).
- **Photographic likeness**: photographs taken under the photo waiver during playtests.
- **Audio recordings**: **planned**, only after the combined photo-and-audio waiver and BREB approval are in place. Not in scope today.
- **Participant-generated content**: writing, drawing, or other expression that a participant produces in their player booklet during a session; verbal narration that the facilitator captures in observation notes.
- **Demographic information**: only collected when a specific session's protocol requires it (e.g. an age range or a community-of-interest filter for a research session). Captured verbally or on a session-specific intake form, never added to a standing participant profile.
- **Operational signals**: the participant's signed consent and waiver documents, their attendance at a specific session, any specific accommodations they requested.

The list explicitly does **not** include things this project does not collect today: biometric data, behavioural analytics, financial information, government identifiers, or any standing online profile.

## 3. Data inventory (playtesting phase, current)

Every category of personal information presently collected, where it lives, and how it gets there.

### 3.1 Photographs

- **What.** Photographs taken during a playtest session under the **photo waiver**. Typically capture the game in play: the table, the cards and tiles in arrangement, participants engaged in the activity. Photographs of participants are taken only of those who signed the waiver.
- **Where it lives.** Originals are downloaded from the camera or phone to the researcher's encrypted personal device immediately after the session, then moved to a long-term encrypted store. See [DATA_GOVERNANCE.md §5](DATA_GOVERNANCE.md#5-custody-of-materials) for the chain of custody.
- **Who can see.** Currently the researcher only. Future BREB-approved research collaborators (under their own institutional protocols) may have access in the research phase.
- **How long.** Indefinite during the playtesting phase, retained for design reference. Will be subject to a retention schedule under the BREB-approved protocol once the research phase opens; see [§4](#4-retention-and-deletion).
- **Participant rights.** A participant who has been photographed under the waiver can request a copy of, or the destruction of, any photograph in which they personally appear, at any time. The waiver text is the source of truth for this right.

### 3.2 Written observation notes

- **What.** Notes the facilitator writes during and after a session. Capture: what happened at the table, what cards and tiles were picked, what rule modifications players proposed, what feedback players gave verbally, any moments of design interest. Participants are referred to by an **in-session pseudonym** (typically a first-name initial or a participant code), never by full real name.
- **Where it lives.** Written on paper at the session and digitised within 48 hours to an encrypted file in the researcher's notes archive; the paper original is then either retained in a locked drawer or shredded after digitisation.
- **Who can see.** Currently the researcher only. Future BREB-approved collaborators in the research phase.
- **How long.** Retained indefinitely as part of the project's design and methodology record.
- **Participant rights.** A participant can ask the researcher to redact any specific reference to them in the notes; the redaction is applied to the digital copy.

### 3.3 Player booklets (playtesting phase)

- **What.** The physical booklet each participant uses during a session. Contains the player's writing, drawing, character-creation responses, and any other expression they produce. Highly personal.
- **Where it lives during playtesting.** **With the player.** Booklets are not retained by the researcher during the playtesting phase. The booklet is the player's own.
- **What the researcher may capture.** With verbal consent from the participant, the researcher may photograph specific pages of a booklet for design reference. The photograph then sits with the other session photographs under the photo waiver. The booklet itself goes home with the player.
- **Who can see.** The player, plus anyone the player chooses to show. The researcher sees only the photographed pages (when the player consents).

The research-phase rule for booklets is materially different; see [§3.6](#36-research-phase-additions-planned).

### 3.4 Signed waivers and consent documents

- **What.** Physical or electronic copies of the photo waiver signed by each participant who consents to being photographed. The waiver records: participant name, signature, date, scope of consent.
- **Where it lives.** Originals retained by the researcher in a secured (locked) physical location, with a scanned encrypted backup. See [DATA_GOVERNANCE.md §5](DATA_GOVERNANCE.md#5-custody-of-materials).
- **Who can see.** The researcher; UBC BREB on request once the research phase opens; UBC GRSJ administrative reviewers if applicable.
- **How long.** Retained for the duration of the project plus the document-retention period required by UBC and TCPS 2 (typically five years post-publication).

### 3.5 Session logistics records

- **What.** A small record of who attended which session, when, and any accommodations requested. Includes the participant's name and contact details if those were collected to coordinate attendance.
- **Where it lives.** In the researcher's encrypted notes archive, alongside the corresponding observation notes.
- **Who can see.** The researcher.
- **How long.** Retained for the duration of the project; destroyed at project closeout unless a specific retention requirement applies.

### 3.6 Research-phase additions (planned)

Once UBC BREB approves the research protocol, the inventory grows. Items below are not collected today.

- **Audio recordings.** Captured under a combined photo-and-audio waiver. Stored encrypted; transcribed; anonymised in the transcript. Retention schedule and access controls documented in [DATA_GOVERNANCE.md §4.2](DATA_GOVERNANCE.md#42-research-phase-data-classes-planned).
- **Completed player booklets.** In the research phase, **booklets are retained by the researcher**, not kept by the player. The informed consent form will state this explicitly so participants know in advance that their booklet becomes part of the research record. Each booklet is tagged with the participant's pseudonym only; the pseudonym-to-real-name mapping is held separately under stricter controls (see [DATA_GOVERNANCE.md §5](DATA_GOVERNANCE.md#5-custody-of-materials)).
- **Post-session interview transcripts.** Semi-structured interviews conducted after each research session, audio-recorded under the combined waiver, transcribed, anonymised.
- **Demographic intake forms.** Per-session, only the demographics the specific study calls for (age range, country, gender identity, community of interest, etc.). Bound to the session (i.e. to the participant's pseudonym for that session); not added to a standing participant profile.

## 4. Retention and deletion

| Material | Phase | Retention | Trigger |
|---|---|---|---|
| Photographs (waivered) | playtesting (current) | Indefinite, for design reference | Project decision; participant can request destruction at any time |
| Photographs (waivered) | research (planned) | Per BREB-approved schedule (typically project + 5 years) | BREB protocol |
| Written observation notes | both phases | Indefinite, part of the methodology record | Project decision; redaction on participant request |
| Player booklets | playtesting (current) | Not retained — with the player | n/a |
| Player booklets | research (planned) | Per BREB-approved schedule | BREB protocol |
| Audio recordings (planned) | research (planned) | Per BREB-approved schedule | BREB protocol; participant can request destruction within the withdrawal window |
| Signed waivers and consent | both | Project duration + UBC / TCPS 2 mandated period (typically 5 years post-publication) | Institutional policy |
| Session logistics records | both | Project duration | Project closeout |
| Demographic intake forms (planned) | research (planned) | Per BREB-approved schedule | BREB protocol |

The retention schedules listed as "per BREB-approved schedule" will be specified concretely when the BREB protocol is filed; see [ROADMAP.md](ROADMAP.md).

## 5. Access and visibility

### 5.1 The participant themselves

A participant can:

- Review their own booklet during and after a session (the player keeps it in the playtesting phase; sees it during the session in the research phase).
- Request a copy of, or the destruction of, any photograph in which they appear, at any time.
- Request redaction of any reference to them in the written observation notes.
- Withdraw from the project; see [§7](#7-participant-rights-and-self-service).

### 5.2 Other participants in the same session

Other players at the table see:

- What you say and do during the session, as a matter of course.
- The pages of your booklet that you choose to show or read aloud.
- They do **not** retain a copy of your materials, and they are not given access to the researcher's observation notes or photographs.

The facilitator's session opening makes the bounds of in-session visibility explicit so participants can choose their level of sharing accordingly.

### 5.3 The researcher

The researcher (currently Adri M., a single person) has access to all materials collected. This access is governed by the project's stated commitments to confidentiality, by the photo waiver in the playtesting phase, and by the BREB-approved protocol in the research phase. The researcher is the custodian of the materials and is responsible for their custody-of-materials posture; see [DATA_GOVERNANCE.md §5](DATA_GOVERNANCE.md#5-custody-of-materials).

### 5.4 UBC BREB and institutional reviewers

UBC BREB has the institutional authority to review the project's research records as part of its oversight role. UBC GRSJ administrative reviewers and the project's supervisor have similar oversight rights within their institutional roles. None of these reviewers receive routine copies of session materials; their access is on request and is governed by their own institutional confidentiality obligations.

### 5.5 Future research collaborators (planned)

In the research phase, additional collaborators (e.g. a research assistant, a co-investigator) may be brought in under the BREB-approved protocol. Each collaborator is named in the BREB submission and bound by the same confidentiality commitments as the lead researcher.

### 5.6 The public

No raw materials (photographs of identifiable participants, audio recordings, full booklet contents, full observation notes) are ever published. Anonymised excerpts are published only in the research phase and only as documented in [COMPLIANCE.md §4.4](COMPLIANCE.md#44-use-of-research-data-in-publication-planned-post-breb).

## 6. Data minimisation choices

Architectural decisions that keep the project from collecting more than it needs.

- **6.1 No audio in the playtesting phase.** Audio recording is deferred until the BREB-approved protocol and the combined photo-and-audio waiver are in place. Until then, the project relies on written observation notes.
- **6.2 No video.** The methodology calls for audio recording at research-phase sessions; video is **not** captured at any phase. See `Foundations/proposal-summary.md` ("Methodology") for the rationale.
- **6.3 No standing online profile.** The boardgame project does not maintain a database of participants. Each session's records sit with that session; there is no master roster of "all participants ever."
- **6.4 In-session pseudonyms in notes.** Observation notes refer to participants by first-name initial or participant code, never by full real name. The pseudonym-to-name mapping (when one is kept, in the research phase) is held separately under stricter controls.
- **6.5 No biometric, financial, or government-identifier collection.** Out of scope.
- **6.6 Per-session demographics, not standing demographics.** When demographic data is collected (research phase only), it is bound to that specific session and is not added to a standing participant profile across sessions.
- **6.7 No third-party trackers, no automated decision-making.** This is a physical research project; there is no software pipeline that the participant's data flows through. The marketing site and the videogame have their own minimisation commitments documented in their respective privacy docs.
- **6.8 No AI-driven analysis of participant content.** All analysis is performed by the researcher (and BREB-approved collaborators) through manual thematic coding. Participant materials are not fed to a generative-AI service for summarisation, recommendation, or any other purpose. This aligns with the project's wider stance against generative-AI mediation of participant expression; see `Foundations/proposal-summary.md` ("A note on AI-generated assets").
- **6.9 Booklets stay with players in the playtesting phase.** The most intimate artifact a participant produces is the one they keep. Booklets only become part of the research record in the research phase, with informed consent that says so explicitly.

## 7. Participant rights and self-service

### 7.1 Access (the right to know what is held about you)

A participant can ask the researcher what session materials reference them. The researcher will name: (a) which session they attended, (b) whether they were photographed under the waiver, (c) whether they are referenced in the written observation notes and under what pseudonym, (d) any other session-specific record. In the research phase, this extends to audio recordings and retained booklets.

### 7.2 Correction

A participant can ask the researcher to correct any factual error in the written records that reference them. Corrections are applied to the digital copy.

### 7.3 Erasure / redaction

A participant can ask the researcher to:

- destroy any photograph in which they appear,
- redact specific references to them in the written observation notes,
- (research phase, planned) destroy any audio recording in which they appear, within the withdrawal window defined by the BREB protocol,
- (research phase, planned) destroy or anonymise their retained booklet within the withdrawal window.

Requests received in writing (email is acceptable) are acknowledged and executed within a defined window; the planned window is two weeks, to be confirmed in the BREB submission.

### 7.4 Withdrawal of participation

A participant can withdraw from the project at any time without explanation or penalty. In the playtesting phase, withdrawal means: any photographs of them are destroyed, references to them in observation notes are redacted on request, and they are not invited to subsequent sessions. In the research phase, withdrawal mechanics and a withdrawal window are documented on the BREB-approved consent form.

### 7.5 Use of materials in publication

Anonymisation is the safeguard. See [COMPLIANCE.md §4.4](COMPLIANCE.md#44-use-of-research-data-in-publication-planned-post-breb) for the policy.

## 8. Logging and audit

The boardgame project's "audit trail" is the researcher's notes archive plus the signed-waivers archive. There is no automated log of who looked at what. Operator-level access is governed by the custody-of-materials controls in [DATA_GOVERNANCE.md §5](DATA_GOVERNANCE.md#5-custody-of-materials).

## 9. Third-party data flows

Boardgame sessions are physical events conducted in person. No automatic third-party data flow occurs from a session.

The exceptions are:

- **Email coordination.** If a participant emails the researcher to RSVP or to ask a question, that email transits whatever mail providers sit between them. Recipient address and message body are visible to those providers per their own privacy policies. The researcher uses a UBC-affiliated email address for project correspondence.
- **Cloud-backed photo capture.** Photographs are taken on devices that may sync to a cloud service by default. The researcher's working device is configured to prevent automatic cloud sync of session photographs; photographs are moved to encrypted local storage promptly. See [DATA_GOVERNANCE.md §5](DATA_GOVERNANCE.md#5-custody-of-materials).
- **Print and manufacturing partners.** Production materials (the rulebook PDF, card layouts, tile artworks) are sent to print partners to manufacture copies. These materials contain **no participant data**. See [PRODUCTION.md §5](PRODUCTION.md#5-print-and-manufacturing-partners) for the production-side data flows.

The marketing site and the videogame have their own third-party data flow documentation in their respective privacy docs.

## 10. Backups

Encrypted local backups of digitised observation notes, scanned waivers, and photographs are maintained on a separate encrypted external drive held by the researcher. See [DATA_GOVERNANCE.md §7](DATA_GOVERNANCE.md#7-backups-and-recovery) for the backup procedure. Physical paper records (original signed waivers, original handwritten observation notes prior to digitisation) are stored in a locked location at the researcher's residence.

## 11. Known gaps

Documented here for transparency. Each maps to an entry in [ROADMAP.md](ROADMAP.md).

### 11.1 No BREB protocol active yet

The current vocabulary, retention schedule, and consent mechanism are those of the **playtesting phase**. Research-phase additions are not active. BREB filing planned for summer 2026.

### 11.2 Photo waiver canonical filename pending

The photo waiver is in active use, but its canonical filename and storage location under `~/FileShare/jw/` are pending canonicalisation. Listed in [COMPLIANCE.md §9.2](COMPLIANCE.md#92-photo-waiver-source-of-truth-file-not-yet-canonicalised).

### 11.3 Withdrawal window not yet formally defined

The two-week withdrawal-response window described in [§7.3](#73-erasure--redaction) is the planned default; the BREB-approved window will supersede this once filed.

### 11.4 No data-portability export

A participant can ask the researcher for a copy of materials in which they appear, but there is no automated export. Given the small scale and physical nature of the project, this is appropriate for now.

## 12. Verification

To verify the claims in this document, a reader can:

1. Read [COMPLIANCE.md](COMPLIANCE.md) for the framework mapping, [DATA_GOVERNANCE.md](DATA_GOVERNANCE.md) for the operational controls, and [PLAYTESTING.md](PLAYTESTING.md) for the session-level mechanics.
2. Inspect the photo waiver (on file with the researcher; will accompany the BREB submission).
3. Read the rulebook at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Rulebook.pdf> and the player booklet at <https://www.journeyways.ca/download/JOURNEYWAYS%20-%20Player%20Booklet.pdf>.
4. Once BREB approves the research protocol, inspect the approved informed consent form and the combined photo-and-audio waiver.

## 13. Document control

| Field | Value |
|---|---|
| Game version | v1.0 (playtest edition) |
| Document version | 1.0 |
| Last reviewed | 2026-05-12 |
| Owner | Adri M. |
| Sibling documents | `COMPLIANCE.md`, `DATA_GOVERNANCE.md`, `PRODUCTION.md`, `PLAYTESTING.md`, `ROADMAP.md` |
