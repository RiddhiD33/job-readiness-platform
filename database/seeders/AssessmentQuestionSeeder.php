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
    // Assessment 1
    AssessmentQuestion::create([
        'assessment_id' => 1,
        'question_type' => 'mcq',
        'question' => 'Full form of ORM',
        'options' => [
            'Object-Relational Mapping',
            'Object-Relational Model',
            'Object-Relationship Mapping',
        ],
        'correct_answer' => 'Object-Relational Mapping',
    ]);

    AssessmentQuestion::create([
        'assessment_id' => 1,
        'question_type' => 'practical',
        'question' => 'Create a Laravel migration for a users table.',
        'options' => null,
        'correct_answer' => null,
    ]);

    // Assessment 2
    AssessmentQuestion::create([
        'assessment_id' => 2,
        'question_type' => 'mcq',
        'question' => 'Full form of CSS',
        'options' => [
            'Cascading Style Sheet',
            'Cascading Style Shape',
            'Coding Style Sheet',
        ],
        'correct_answer' => 'Cascading Style Sheet',
    ]);

    AssessmentQuestion::create([
        'assessment_id' => 2,
        'question_type' => 'practical',
        'question' => 'Create a responsive navigation bar using HTML and CSS.',
        'options' => null,
        'correct_answer' => null,
    ]);

    // Assessment 3
    AssessmentQuestion::create([
        'assessment_id' => 3,
        'question_type' => 'mcq',
        'question' => 'What does PHP stand for?',
        'options' => [
            'Hypertext Preprocessor',
            'Personal Home Page',
            'Private Home Protocol',
        ],
        'correct_answer' => 'Hypertext Preprocessor',
    ]);
}}
