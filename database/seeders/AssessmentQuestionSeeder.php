<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentQuestion;

class AssessmentQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
{
    $questions = [
        1 => ['What is Laravel?', 'Create a User Migration'],
        2 => ['What does PHP stand for?', 'Create a PHP Class'],
        3 => ['What is Authentication?', 'Build Login System'],
        4 => ['What is CRUD?', 'Build CRUD Module'],

        5 => ['What does HTML stand for?', 'Create HTML Page'],
        6 => ['What is JavaScript?', 'Create JS Counter'],
        7 => ['What is React?', 'Create React Component'],

        8 => ['What is OOP?', 'Create PHP Class using OOP'],
        9 => ['What is Composer?', 'Install Package using Composer'],

        10 => ['What is REST API?', 'Build REST API'],
        11 => ['What is Database Normalization?', 'Design Database'],
        12 => ['What is Deployment?', 'Deploy Laravel Project'],
    ];

    foreach ($questions as $assessmentId => $data) {

       for ($i = 1; $i <= 5; $i++) {

    AssessmentQuestion::create([
        'assessment_id' => $assessmentId,
        'question_type' => 'mcq',
        'question' => $data[0] . " (MCQ {$i})",
        'options' => [
            'Option A',
            'Option B',
            'Option C',
            'Option D',
        ],
        'correct_answer' => 'Option A',
        'max_score' => 5,
    ]);
}

        AssessmentQuestion::create([
            'assessment_id' => $assessmentId,
            'question_type' => 'practical',
            'question' => $data[1],
            'options' => null,
            'correct_answer' => null,
            'max_score' => 75,
        ]);
    }
}
}