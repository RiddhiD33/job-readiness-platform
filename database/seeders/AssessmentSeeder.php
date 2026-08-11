<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assessment;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assessment::create([
            'career_path_id' =>1,
            'title'=>'Laravel Basics'
        ]);

        Assessment::create([
            'career_path_id' => 3,
            'title'=>'PHP Basics',
        ]);

         Assessment::create([
            'career_path_id' =>1,
            'title'=>'Laravel Authentication'
        ]);

         Assessment::create([
            'career_path_id' =>1,
            'title'=>'Laravel CRUD Operations'
        ]);

        Assessment::create([
            'career_path_id' =>2,
            'title'=>'HTML & CSS Fundamentals',
        ]);

        Assessment::create([
            'career_path_id' =>2,
            'title'=>'JavaScript Essentials',
        ]);

        Assessment::create([
            'career_path_id' =>2,
            'title'=>'React Basics',
        ]);

         Assessment::create([
            'career_path_id' => 3,
            'title'=>'Object-Oriented PHP',
        ]);

         Assessment::create([
            'career_path_id' => 3,
            'title'=>'Composer & Autoloading',
        ]);

        Assessment::create([
            'career_path_id'=>4,
            'title'=>'REST API Development',
        ]);

        Assessment::create([
            'career_path_id'=>4,
            'title'=>'Database Design',
        ]);

        Assessment::create([
            'career_path_id'=>4,
            'title'=>'Deployment Basics',
        ]);

        


    }
}
