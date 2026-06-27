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
            'career_path_id' =>2,
            'title'=>'Frontend Tests',
        ]);

        Assessment::create([
            'career_path_id' => 3,
            'title'=>'PHP Basics',
        ]);

        Assessment::create([
            'career_path_id'=>4,
            'title'=>'CRUD Advanced',
        ]);
    }
}
