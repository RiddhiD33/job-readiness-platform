<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Internship; 

class InternshipSeeder extends Seeder
{
    public function run(): void
    {
        Internship::create([
            'student_profile_id' => 1,
            'company_name' => 'Achten Technology',
            'designation' => 'Laravel Developer',
            'start_date' => '2024-11-04',
            'end_date' => '2025-07-01',
            'description' => 'Build an Attendance System',
            'certificate_url' => 'https://github.com/testuser/attendance-system',
            'github_link' => 'https://github.com/testuser/attendance-system',
            'demo_link' => 'https://github.com/testuser/attendance-system',
            'status' => 'draft',
        ]);

         Internship::create([
            'student_profile_id' => 1,
            'company_name' => 'Vedant Technology',
            'designation' => 'web Developer',
            'start_date' => '2025-07-02',
            'end_date' => '2026-07-01',
            'description' => 'Build an Inventory System',
            'certificate_url' => 'https://github.com/testuser/attendance-system',
            'github_link' => 'https://github.com/testuser/attendance-system',
            'demo_link' => 'https://github.com/testuser/attendance-system',
            'status' => 'draft',
        ]);
    }
}