# Readiness Score System

## Purpose

The Readiness Score measures how prepared a student is for a job or internship in their selected career path.

The score helps:

* Students understand their current readiness level.
* Recruiters quickly identify suitable candidates.
* The platform provides a standardized evaluation system.

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

* The latest assessment score becomes the score used in readiness score calculations.
* Previous attempts remain stored in history.

---

# Project Contribution (25%)

Projects demonstrate practical implementation skills.

Only published projects contribute to the readiness score.

Each published project is evaluated independently.

Base Project Score

Every published project starts with

10 points
GitHub Repository

If the project contains a GitHub repository:

+3 points
Live Demo

If the project contains a working demo link:

+2 points
Career Path Skill Matching

Each project is also evaluated against the skills required by the student's selected career path.

The platform calculates

Matched Skills
-----------------------
Career Path Skills

The result contributes a maximum of

5 points

Example

Career Path Skills

PHP
Laravel
MySQL

Project Skills

PHP
Laravel

Matching

2 / 3

Skill Score

2/3 × 5 = 3.33

Final Project Score

10
+3 GitHub
+2 Demo
+3.33 Skill Match
=
18.33

The maximum readiness contribution from projects is capped at

100
3. Internship section also needs updating

Replace it similarly.

Internship Contribution (25%)

Only published internships contribute to the readiness score.

Each internship begins with

10 points

If a certificate is provided

+5 points

# Internship skills are compared against the student's selected career path.

Skill matching contributes up to

5 points

Example

Career Path

HTML
CSS
JavaScript

Internship Skills

HTML
CSS

Skill Score

2/3 × 5 = 3.33

Final Internship Score

10
+5 Certificate
+3.33 Skill Match
=
18.33

The internship contribution is capped at

100

# Profile Completeness (10%)

The profile score is calculated from six fields.

Field	Points
Phone Number	10
Current City	10
Career Path	10
CGPA	20
Resume	25
Portfolio	25

Maximum

100

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
* Student creates a project
* Student updates a project
* Student publishes a project
* Student deletes a project

* Student creates an internship
* Student updates an internship
* Student publishes an internship
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

Historical records help demonstrate learning progress and growth.

---

# Missing Data Rules

Current Version (V1)

If a student has no projects or internships, those components contribute

0

The component weights remain unchanged.

Future versions may introduce intelligent weight redistribution to better support early-semester students.

## Weight Redistribution Rules

The platform ensures that students are not penalized for lacking internships or projects, especially early in their academic journey.

### Scenario 1: No Internship

Original Internship Weight:

```text
25%
```

Redistributed Formula:

| Component            | Weight |
| -------------------- | ------ |
| Assessment           | 50%    |
| Projects             | 40%    |
| Profile Completeness | 10%    |

---

### Scenario 2: No Project

Original Project Weight:

```text
25%
```

Redistributed Formula:

| Component            | Weight |
| -------------------- | ------ |
| Assessment           | 50%    |
| Internship           | 40%    |
| Profile Completeness | 10%    |

---

### Scenario 3: No Project and No Internship

Redistributed Formula:

| Component            | Weight |
| -------------------- | ------ |
| Assessment           | 90%    |
| Profile Completeness | 10%    |

This scenario is expected to be common for early-semester students who have not yet completed projects or internships.

The platform still provides a meaningful readiness score while encouraging students to improve their profile and complete assessments.


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


Career Path Relevance

Projects and internships are evaluated only against the student's currently selected career path.

Skill matching is performed using

Career Path Skills

versus

Project Skills

or

Internship Skills

This ensures that unrelated work contributes less than work directly aligned with the student's career goal.

9. Add another section

This is something we discussed today.

Current Limitations

The current scoring system evaluates

Project publication status
GitHub availability
Demo availability
Skill matching
Internship certificate
Internship skill matching

The platform does not yet evaluate

Project originality
Code quality
Complexity
Architecture
Problem-solving ability

These improvements are planned for future versions.