<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create(['name'=>'PHP']);
        Skill::create(['name'=>'Laravel']);
        Skill::create(['name'=>'MySQL']);
        Skill::create(['name'=>'HTML']);
        Skill::create(['name'=>'CSS']);
        Skill::create(['name'=>'JavaScript']);
        Skill::create(['name'=>'React']);
    }
}
