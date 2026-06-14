# API Design

## Authentication APIs

### Register

POST /api/register

### Login

POST /api/login

### Logout

POST /api/logout

---

## Student Profile APIs

### Get Own Profile

GET /api/profile

### Update Profile

PUT /api/profile

### Get Student Profile

GET /api/profile/{studentId}

### Profile Status

* Draft
* Public

### Rules

Draft Profile:

* Not visible to recruiters
* Not included in readiness score
* Not searchable

Public Profile:

* Visible to recruiters
* Included in readiness score
* Searchable

---

## Project APIs

### List Projects

GET /api/projects

### Create Project

POST /api/projects

### Update Project

PUT /api/projects/{id}

### Delete Project

DELETE /api/projects/{id}

### Rules

* Only owner student can manage projects.
* Recruiters can view projects through public profiles.
* Any project change triggers readiness score recalculation.

---

## Internship APIs

### List Internships

GET /api/internships

### Create Internship

POST /api/internships

### Update Internship

PUT /api/internships/{id}

### Delete Internship

DELETE /api/internships/{id}

### Rules

* Only owner student can manage internships.
* Recruiters can view internships through public profiles.
* Any internship change triggers readiness score recalculation.

---

## Assessment APIs

### List Available Assessments

GET /api/assessments

### View Assessment

GET /api/assessments/{id}

### Start Assessment

POST /api/assessments/{id}/start

### Submit Assessment

POST /api/assessments/{id}/submit

### View Assessment History

GET /api/assessment-attempts

### View Assessment Attempt

GET /api/assessment-attempts/{id}

### Rules

* Every assessment attempt is stored permanently.
* Latest score is displayed prominently.
* Historical attempts remain accessible.
* Assessment submission triggers readiness score recalculation.

---

## Recruiter APIs

### Search Students

GET /api/students

### Filter Students

Supported Filters:

* readiness_score
* skills
* location
* cgpa

Example:
GET /api/students?readiness_score=80&skill=laravel

### View Student Profile

GET /api/profile/{studentId}

### View Student Assessment History

GET /api/students/{studentId}/assessment-attempts

### View Assessment Attempt Details

GET /api/students/{studentId}/assessment-attempts/{attemptId}

### Mark Interest

POST /api/recruiter-interests

### View Interested Students

GET /api/recruiter-interests

### Rules

* Recruiters can only view public profiles.
* Recruiters cannot view draft profiles.
* Student approval workflow is not included in Version 1.

---

## Admin APIs

### Career Path Management

GET /api/admin/career-paths
POST /api/admin/career-paths
PUT /api/admin/career-paths/{id}
DELETE /api/admin/career-paths/{id}

### Skill Management

GET /api/admin/skills
POST /api/admin/skills
PUT /api/admin/skills/{id}
DELETE /api/admin/skills/{id}

### Assessment Management

GET /api/admin/assessments
POST /api/admin/assessments
PUT /api/admin/assessments/{id}
DELETE /api/admin/assessments/{id}

### Assessment Question Management

GET /api/admin/assessment-questions
POST /api/admin/assessment-questions
PUT /api/admin/assessment-questions/{id}
DELETE /api/admin/assessment-questions/{id}

### Practical Task Management

GET /api/admin/practical-tasks
POST /api/admin/practical-tasks
PUT /api/admin/practical-tasks/{id}
DELETE /api/admin/practical-tasks/{id}

### Student Monitoring

GET /api/admin/students
GET /api/admin/students/{id}
DELETE /api/admin/students/{id}

### Recruiter Monitoring

GET /api/admin/recruiters
GET /api/admin/recruiters/{id}
DELETE /api/admin/recruiters/{id}

### Rules

Admins Can:

* View all platform data
* Create and manage platform content
* Deactivate accounts

Admins Cannot:

* Edit student-entered data
* Edit recruiter-entered data
* Modify assessment attempts
* Modify student projects
* Modify student internships
