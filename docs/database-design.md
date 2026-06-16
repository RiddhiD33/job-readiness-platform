# Database Design

## Purpose

This document defines the database structure for the Job Readiness Platform.

The goal is to store student profiles, projects, internships, assessments, recruiter activities, and readiness scores in a structured and scalable way.

---

# Main Tables

## users

Stores authentication information for all users.

Fields:

* id
* name
* email
* password
* role
* created_at
* updated_at

Roles:

* student
* recruiter
* admin

---

## student_profiles

Stores detailed student information.

Fields:

* id
* user_id
* phone
* current_city
* cgpa (nullable)
* portfolio_url
* resume_url
* career_path_id
* readiness_score
* profile_status
* created_at
* updated_at

Profile Status Values:

* draft
* public

---

## recruiter_profiles

Stores recruiter information.

Fields:

* id
* user_id
* company_name
* designation
* created_at
* updated_at

---

## career_paths

Stores available career paths.

Examples:

* Laravel Developer
* Full Stack Developer
* Frontend Developer

Fields:

* id
* name
* description
* created_at
* updated_at

---

## skills

Master table for all skills.

Examples:

* Laravel
* MySQL
* Git
* React

Fields:

* id
* name
* description
* created_at
* updated_at

---

## projects

Stores student projects.

Fields:

* id
* student_profile_id
* title
* description
* project_type
* github_link
* demo_link
* status
* created_at
* updated_at

Project Type Values:

* personal
* academic
* company
* freelance

Status Values:

* draft
* published

---

## internships

Stores student internship information.

Fields:

* id
* student_profile_id
* company_name
* designation
* start_date
* end_date
* description
* certificate_url
* github_link
* demo_link
* status
* created_at
* updated_at

Status Values:

* draft
* published

---

## assessments

Stores assessments.

Fields:

* id
* career_path_id
* title
* created_at
* updated_at

---

## assessment_questions

Stores assessment questions.

Fields:

* id
* assessment_id
* question_type
* question
* options
* correct_answer
* created_at
* updated_at

Question Types:

* mcq
* practical

---

## assessment_attempts

Stores every assessment attempt.

Fields:

* id
* student_profile_id
* assessment_id
* score
* created_at
* updated_at

Note:

Every assessment attempt must be stored.

---

## assessment_attempt_answers

Stores answers submitted during an assessment attempt.

Fields:

* id
* assessment_attempt_id
* assessment_question_id
* answer
* score
* created_at
* updated_at

---

## recruiter_interests

Stores recruiter interest in student profiles.

Fields:

* id
* recruiter_profile_id
* student_profile_id
* created_at
* updated_at

---

## career_path_history

Stores career path changes made by students.

Fields:

* id
* student_profile_id
* career_path_id
* created_at

* Note:
Stores historical career path selections.
Records are append-only and should not be updated.

---

# Junction Tables

## student_skills

Links students and skills.

Fields:

* student_profile_id
* skill_id

---

## career_path_skills

Links career paths and skills.

Fields:

* career_path_id
* skill_id

---

## project_skills

Links projects and skills.

Fields:

* project_id
* skill_id

---

## internship_skills

Links internships and skills.

Fields:

* internship_id
* skill_id

---

# Important Decisions

1. Separate profile tables are used for students and recruiters.

2. Every assessment attempt is stored.

3. Readiness score is stored and recalculated when profile data changes.

4. Skills use many-to-many relationships.

5. Projects and internships support draft and published status.

6. CGPA is optional.

7. Recruiters can express interest in student profiles.

8. Only published projects and internships are visible to recruiters.
