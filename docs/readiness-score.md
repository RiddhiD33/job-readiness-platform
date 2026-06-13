# Readiness Score System

## Purpose

The Readiness Score measures how prepared a student is for a job or internship in their selected career path.

The score helps:

* Students understand their current readiness level.
* Recruiters quickly identify suitable candidates.
* The platform provide a standardized evaluation system.

The readiness score ranges from:

```text
0 - 100
```

---

# Readiness Score Components

The readiness score is calculated using four components.

| Component            | Weight |
| -------------------- | ------ |
| Assessment Score     | 40%    |
| Projects             | 25%    |
| Internships          | 25%    |
| Profile Completeness | 10%    |

Total:

```text
100%
```

---

# Assessment Contribution (40%)

Assessments are the most important contributor because they directly measure knowledge and practical skills.

Each assessment contains:

* 5 MCQs
* 1 Practical Task

Assessment scores are stored permanently.

When a student retakes an assessment:

* The new score becomes the current score.
* Previous attempts remain stored in history.

---

# Project Contribution (25%)

Projects demonstrate practical implementation skills.

Projects may include:

* Title
* Description
* Technologies Used
* GitHub Link (Optional)
* Demo Link (Optional)

Projects contribute to the readiness score based on platform-defined scoring rules.

---

# Internship Contribution (25%)

Internships demonstrate industry exposure and real-world experience.

Internships may include:

* Company Name
* Designation
* Tech Stack
* Start Date
* End Date
* Internship Description
* Certificate (Optional)
* GitHub Link (Optional)
* Demo Link (Optional)

Internships contribute to the readiness score based on platform-defined scoring rules.

---

# Profile Completeness Contribution (10%)

Students receive profile completeness points for providing important profile information.

Examples:

* Profile Information
* Academic Information
* Career Path
* Resume
* Skills
* Current City
* Portfolio Links

Profile completeness encourages students to maintain complete profiles.

---

# Skill Handling

Skills do NOT directly contribute to the readiness score.

Skills are used for:

* Career Path Mapping
* Recruiter Search
* Recruiter Filters
* Assessment Design

This prevents students from artificially increasing their score by simply adding skills without demonstrating them.

---

# Readiness Score Recalculation

The readiness score is recalculated when:

* Student completes an assessment
* Student retakes an assessment
* Student adds a project
* Student updates a project
* Student deletes a project
* Student adds an internship
* Student updates an internship
* Student deletes an internship
* Student updates profile information
* Student changes career path

The readiness score is NOT recalculated when:

* Student views profile
* Recruiter views profile
* Recruiter searches students

---

# Career Path Change Rules

When a student changes career path:

Example:

```text
Laravel Developer
→ Full Stack Developer
```

The platform recalculates the readiness score according to the newly selected career path.

Previous career path data is NOT deleted.

Stored historical data includes:

* Previous assessments
* Previous scores
* Previous career paths

---

# Historical Records

The platform stores all assessment attempts.

Students can view their assessment history.

Recruiters can view historical readiness records when available.

Historical records help demonstrate learning progress and growth.

---

# Missing Data Rules

Students may not always have internships or projects.

The readiness score calculation must handle:

* No internship available
* No project available
* No internship and no project available

The platform redistributes weights according to the approved business rules while ensuring the final score remains out of 100.

---

# Version 1 Scope

Version 1 includes:

* Assessment contribution
* Project contribution
* Internship contribution
* Profile completeness contribution
* Historical assessment records
* Career path recalculation

Future versions may introduce additional scoring enhancements and analytics.
