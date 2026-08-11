<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;

class ProjectSkillSeeder extends Seeder
{
    public function run(): void
    {
        // Attendance System (100% Match)
        Project::where('title', 'Attendance System')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', [
                    'PHP',
                    'Laravel',
                    'MySQL'
                ])->pluck('id')
            );

        // Task Manager (Partial Match)
        Project::where('title', 'Task Manager')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', [
                    'PHP',
                    'Laravel'
                ])->pluck('id')
            );

        // Blog CMS (Low Match)
        Project::where('title', 'Blog CMS')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', [
                    'PHP'
                ])->pluck('id')
            );

        // Weather App (Draft - ignored)
        Project::where('title', 'Weather App')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', [
                    'PHP',
                    'Laravel',
                    'MySQL'
                ])->pluck('id')
            );

        // Portfolio (100% Match)
        Project::where('title', 'Portfolio Website')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', [
                    'HTML',
                    'CSS',
                    'JavaScript'
                ])->pluck('id')
            );

        // Todo App (Extra Skill)
        Project::where('title', 'Todo App')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', [
                    'HTML',
                    'CSS',
                    'JavaScript',
                    'React'
                ])->pluck('id')
            );

        // Calculator (Partial Match)
        Project::where('title', 'Calculator')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', [
                    'HTML',
                    'CSS'
                ])->pluck('id')
            );

        // Chat App (Draft)
        Project::where('title', 'Chat App')
            ->first()
            ?->skills()
            ->attach(
                Skill::whereIn('name', [
                    'React',
                    'JavaScript'
                ])->pluck('id')
            );
    }
}