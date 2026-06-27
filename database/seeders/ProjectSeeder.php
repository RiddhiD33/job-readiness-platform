<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'student_profile_id'=>1,
            'title'=>'Attendance System',
            'description'=>'It handles biometric attendance tracking',
            'project_type'=>'personal',
            'github_link' => 'https://github.com/testuser/attendance-system',
            'demo_link' => 'https://attendance-demo.test',
            'status'=>'published',
        ]);
    }
}
