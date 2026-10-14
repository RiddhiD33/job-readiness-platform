<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Internship;

class InternshipSeeder extends Seeder
{
    public function run(): void
    {
        // Draft internship (should NOT count)
        Internship::create([
            'student_profile_id' => 1,
            'company_name' => 'Achten Technology',
            'designation' => 'Laravel Developer',
            'start_date' => '2024-11-04',
            'end_date' => '2025-07-01',
            'description' => 'Attendance System',
            'certificate_url' => 'https://certificate.test/1',
            'github_link' => 'https://github.com/test1',
            'demo_link' => 'https://demo.test/1',
            'status' => 'draft',
        ]);

        // Published internship (should count)
        Internship::create([
            'student_profile_id' => 1,
            'company_name' => 'Vedant Technology',
            'designation' => 'Laravel Developer',
            'start_date' => '2025-07-02',
            'end_date' => '2026-07-01',
            'description' => 'Inventory Management System',
            'certificate_url' => 'https://certificate.test/2',
            'github_link' => 'https://github.com/test2',
            'demo_link' => 'https://demo.test/2',
            'status' => 'published',
        ]);

        // Frontend student
        Internship::create([
            'student_profile_id' => 2,
            'company_name' => 'Frontend Labs',
            'designation' => 'Frontend Developer',
            'start_date' => '2025-01-01',
            'end_date' => '2025-06-01',
            'description' => 'React Dashboard',
            'certificate_url' => null,
            'github_link' => 'https://github.com/frontend',
            'demo_link' => 'https://frontend.demo',
            'status' => 'published',
        ]);

        Internship::create([
            'student_profile_id' => 2,
            'company_name' => 'Google',
            'designation' => 'Frontend Developer',
            'start_date' => '2025-01-01',
            'end_date' => '2025-06-01',
            'description' => 'React Dashboard',
            'certificate_url' =>'https://certificate.test/2',
            'github_link' => 'https://github.com/frontend',
            'demo_link' => 'https://frontend.demo',
            'status' => 'published',
        ]);
    }
}