<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // ===============================
        // Student Profile 1 (Laravel)
        // ===============================

        Project::create([
            'student_profile_id' => 1,
            'title' => 'Attendance System',
            'description' => 'Biometric Attendance Management',
            'project_type' => 'personal',
            'github_link' => 'https://github.com/testuser/attendance-system',
            'demo_link' => 'https://attendance-demo.test',
            'status' => 'published',
        ]);

        Project::create([
            'student_profile_id' => 1,
            'title' => 'Task Manager',
            'description' => 'Laravel Task Management System',
            'project_type' => 'personal',
            'github_link' => 'https://github.com/testuser/task-manager',
            'demo_link' => null,
            'status' => 'published',
        ]);

        Project::create([
            'student_profile_id' => 1,
            'title' => 'Blog CMS',
            'description' => 'Content Management System',
            'project_type' => 'academic',
            'github_link' => null,
            'demo_link' => null,
            'status' => 'published',
        ]);

        Project::create([
            'student_profile_id' => 1,
            'title' => 'Weather App',
            'description' => 'Weather Forecast',
            'project_type' => 'personal',
            'github_link' => 'https://github.com/testuser/weather-app',
            'demo_link' => 'https://weather-demo.test',
            'status' => 'draft',
        ]);

        // ===============================
        // Student Profile 2 (Frontend)
        // ===============================

        Project::create([
            'student_profile_id' => 2,
            'title' => 'Portfolio Website',
            'description' => 'Responsive Portfolio',
            'project_type' => 'personal',
            'github_link' => 'https://github.com/testuser/portfolio',
            'demo_link' => 'https://portfolio-demo.test',
            'status' => 'published',
        ]);

        Project::create([
            'student_profile_id' => 2,
            'title' => 'Todo App',
            'description' => 'React Todo Application',
            'project_type' => 'academic',
            'github_link' => 'https://github.com/testuser/todo-app',
            'demo_link' => null,
            'status' => 'published',
        ]);

        Project::create([
            'student_profile_id' => 2,
            'title' => 'Calculator',
            'description' => 'Simple Calculator',
            'project_type' => 'personal',
            'github_link' => null,
            'demo_link' => null,
            'status' => 'published',
        ]);

        Project::create([
            'student_profile_id' => 2,
            'title' => 'Chat App',
            'description' => 'Realtime Chat',
            'project_type' => 'personal',
            'github_link' => 'https://github.com/testuser/chat-app',
            'demo_link' => 'https://chat-demo.test',
            'status' => 'draft',
        ]);
    }
}