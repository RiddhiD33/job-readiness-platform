# Job Readiness Platform

A Laravel-based web application designed to help students track their career preparation through assessments, projects, internships, and profile completion.

## Overview

The Job Readiness Platform is a personal development project focused on building practical skills in Laravel, REST API development, authentication, database relationships, and business logic.

The project includes a readiness-scoring foundation that combines assessment performance, project experience, internship experience, and profile completeness into an overall score.

## Features

- **Student Authentication:** API authentication using Laravel Sanctum.
- **Student Profiles:** Manage career-related profile information.
- **Project Management:** Create, view, update, and delete project records.
- **Internship Management:** Manage internship information and related skills.
- **Career Paths:** Retrieve career paths and related information.
- **Assessments:** Retrieve assessments and questions, record attempts and answers, and support assessment evaluation.
- **Readiness Scoring:** Calculate a score based on assessment results, published projects, published internships, and profile completeness.
- **Role-Based Access:** Protect API routes using authentication and role middleware.

## Technology Stack

- PHP 8.2+
- Laravel 12
- Laravel Sanctum 4
- MySQL (or another database supported by Laravel)
- Eloquent ORM
- REST APIs
- Composer
- Git and GitHub
- Postman for API testing

## Readiness Score

The current scoring foundation combines four components:

| Component | Weight |
|---|---:|
| Assessment performance | 40% |
| Projects | 25% |
| Internships | 25% |
| Profile completeness | 10% |

The score is calculated from component scores using these fixed weights.

- **Assessments:** Uses the latest attempt for each relevant assessment associated with the student's career path.
- **Projects:** Considers published projects, GitHub and demo link availability, and matching skills.
- **Internships:** Considers published internships, certificate link availability, and matching skills.
- **Profile completeness:** Considers phone number, city, career path, CGPA, resume, and portfolio.

Project and internship component scores are capped at 100. Missing component data contributes zero under the current fixed-weight calculation; weights are not redistributed.

**Current limitation:** Link availability is checked, but the application does not verify whether linked repositories, demos, or certificates are accessible or valid. The score is a development-stage indicator, not a definitive measure of employability.

## API Overview

The API includes endpoints for:

- Registration and login
- Authenticated user information and logout
- Career paths
- Projects and student profiles
- Internships
- Assessments and assessment questions
- Assessment attempts and answers
- Assessment evaluation for authorized administrators

API routes are defined in `routes/api.php`. Check the route list in your local environment for the exact paths and HTTP methods.

## Local Setup

### Requirements

- PHP 8.2 or later
- Composer
- A database supported by Laravel
- Node.js and npm if you need to build the frontend assets

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/RiddhiD33/job-readiness-platform.git
   cd job-readiness-platform
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Create your environment file if it does not already exist:

   ```bash
   copy .env.example .env
   ```

   If `.env` already exists, do not overwrite it.

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Configure your database connection in `.env`.

6. Run migrations:

   ```bash
   php artisan migrate
   ```

7. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

The local API is generally available at `http://127.0.0.1:8000`. Confirm the registered endpoints with:

```bash
php artisan route:list
```

## Testing

Run the Laravel test suite with:

```bash
php artisan test
```

Tests should be run in a properly configured local environment. Do not assume all tests pass until the command completes successfully.

## Project Status

**In development.** Core API functionality, Sanctum authentication, and the initial readiness-scoring implementation are being developed incrementally. Features and documentation may evolve as the project progresses.

## Author

**Riddhi Desai**

GitHub: https://github.com/RiddhiD33