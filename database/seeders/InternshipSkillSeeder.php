<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Internship;
use App\Models\Skill;

class InternshipSkillSeeder extends Seeder
{
    public function run(): void
    {
        Internship::where('company_name', 'Vedant Technology')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', ['PHP', 'Laravel', 'MySQL'])
                    ->pluck('id')
            );

        Internship::where('company_name', 'Frontend Labs')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', ['HTML', 'CSS', 'JavaScript'])
                    ->pluck('id')
            );

        Internship::where('company_name', 'Google')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', ['HTML', 'CSS', 'JavaScript'])
                    ->pluck('id')
            );
    }
}