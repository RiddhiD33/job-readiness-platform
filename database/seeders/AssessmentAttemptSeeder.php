<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentAttempt;

class AssessmentAttemptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
{

   // Student Profile 1 (Laravel)

AssessmentAttempt::create([
    'student_profile_id' => 1,
    'assessment_id' => 1,
    'score' => 40,
]);

AssessmentAttempt::create([
    'student_profile_id' => 1,
    'assessment_id' => 3,
    'score' => 70,
]);

AssessmentAttempt::create([
    'student_profile_id' => 1,
    'assessment_id' => 4,
    'score' => 90,
]);

AssessmentAttempt::create([
    'student_profile_id' => 1,
    'assessment_id' => 1,
    'score' => 95, // Retake
]);

// Student Profile 2 (Frontend)

AssessmentAttempt::create([
    'student_profile_id' => 2,
    'assessment_id' => 5,
    'score' => 55,
]);

AssessmentAttempt::create([
    'student_profile_id' => 2,
    'assessment_id' => 6,
    'score' => 80,
]);

AssessmentAttempt::create([
    'student_profile_id' => 2,
    'assessment_id' => 7,
    'score' => 90,
]);

AssessmentAttempt::create([
    'student_profile_id' => 2,
    'assessment_id' => 5,
    'score' => 85, // Retake
]);
}
}
