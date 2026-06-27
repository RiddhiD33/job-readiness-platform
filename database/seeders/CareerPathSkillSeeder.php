<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CareerPath;
use App\Models\Skill;

class CareerPathSkillSeeder extends Seeder
{
    public function run(): void
    {
        $laravel = CareerPath::where('name', 'Laravel Developer')->first();

        if ($laravel) {
            $laravel->skills()->attach(
                Skill::whereIn('name', ['PHP', 'Laravel', 'MySQL'])->pluck('id')
            );
        }

        $frontend = CareerPath::where('name', 'Frontend Developer')->first();

        if ($frontend) {
            $frontend->skills()->attach(
                Skill::whereIn('name', ['HTML', 'CSS', 'JavaScript'])->pluck('id')
            );
        }

        $fullstack = CareerPath::where('name', 'Fullstack Developer')->first();

        if ($fullstack) {
            $fullstack->skills()->attach(
                Skill::whereIn('name', ['PHP', 'Laravel', 'MySQL', 'JavaScript'])->pluck('id')
            );
        }
    }
}