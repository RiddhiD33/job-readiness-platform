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
       AssessmentAttempt::create([
    'student_profile_id' => 1,
    'assessment_id' => 1,
    'score' => null,
]);

AssessmentAttempt::create([
    'student_profile_id' => 1,
    'assessment_id' => 2,
    'score' => 87,
]);

AssessmentAttempt::create([
    'student_profile_id' => 2,
    'assessment_id' => 1,
    'score' => 56,
]);

AssessmentAttempt::create([
    'student_profile_id' => 2,
    'assessment_id' => 3,
    'score' => null,
]);
}
}
