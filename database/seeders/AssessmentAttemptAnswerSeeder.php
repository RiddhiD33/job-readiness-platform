<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssessmentAttempt;
use App\Models\AssessmentAttemptAnswer;
use App\Models\AssessmentQuestion;

class AssessmentAttemptAnswerSeeder extends Seeder
{
    public function run(): void
    {
        foreach (AssessmentAttempt::all() as $attempt) {

            $questions = AssessmentQuestion::where(
                'assessment_id',
                $attempt->assessment_id
            )->get();

            foreach ($questions as $question) {

                AssessmentAttemptAnswer::create([
    'assessment_attempt_id' => $attempt->id,
    'assessment_question_id' => $question->id,

    'answer' => $question->question_type === 'mcq'
        ? $question->correct_answer
        : 'Practical answer submitted',

    'score' => $question->question_type === 'mcq'
        ? $question->max_score
        : null,

    'is_checked' => $question->question_type === 'mcq',
]);
            }
        }
    }
}