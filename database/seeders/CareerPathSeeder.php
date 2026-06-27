<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CareerPath;

class CareerPathSeeder extends Seeder
{
    public function run(): void
    {
        CareerPath::create([
            'name' => 'Laravel Developer',
            'description' => 'Backend development using Laravel'
        ]);

        CareerPath::create([
            'name' => 'Frontend Developer',
            'description' => 'Build websites using HTML, CSS, JavaScript'
        ]);

        CareerPath::create([
            'name' => 'Backend Developer',
            'description' => 'Building and maintaining server-side logic, APIs, and databases'
        ]);

        CareerPath::create([
            'name' => 'Fullstack Developer',
            'description' => 'Handles both frontend and backend development'
        ]);
    }
}