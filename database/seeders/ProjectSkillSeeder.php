<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;

class ProjectSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $project = Project::where('title', 'Attendance System')->first();

        if($project){
            $project->skills()->attach(skill::whereIn('name',['PHP','Laravel','MySQL'])->pluck('id'));
        }
    }
}
