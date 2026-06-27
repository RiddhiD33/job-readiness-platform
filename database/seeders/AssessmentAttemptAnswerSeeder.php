<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentAttemptAnswer;

class AssessmentAttemptAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssessmentAttemptAnswer::create([
            'assessment_attempt_id'=>2,
            'assessment_question_id'=>3,
            'answer'=>'Cascading Style Sheet',
            'score'=>100,
        ]);

        AssessmentAttemptAnswer::create([
            'assessment_attempt_id'=>2,
            'assessment_question_id'=>5,
            'answer'=>'Created responsive navbar using flexbox.',
            'score'=>null,
        ]);
        
    }
}
