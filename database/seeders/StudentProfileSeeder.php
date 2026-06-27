<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentProfile;

class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentProfile::create([
            'user_id'=>1,
            'phone'=>'9876543210',
            'current_city'=>'Ahmedabad',
            'cgpa'=>9.58,
            'portfolio_url'=>'https://portfolio.test',
            'resume_url'=>'https://example.com/resume.pdf',
            'career_path_id'=>'1',
            'readiness_score'=>80,
            'profile_status'=>'public',
        ]);

         StudentProfile::create([
            'user_id'=>2,
            'phone'=>'9727228548',
            'current_city'=>'surat',
            'cgpa'=>9.50,
            'portfolio_url'=>'https://portfolio.test',
            'resume_url'=>'https://example.com/resume.pdf',
            'career_path_id'=>'2',
            'readiness_score'=>90,
            'profile_status'=>'public',
        ]);

    }
}
