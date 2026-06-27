<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    public function careerPaths(): BelongsToMany{
        return $this->belongsToMany(CareerPath::class,'career_path_skills','skill_id',
        'career_path_id');
    }

    public function studentProfiles(): BelongsToMany{
        return $this->belongsToMany(StudentProfile::class);
    }

    public function projects(): BelongsToMany{
        return $this->belongsToMany(Project::class,'project_skills');
    }

    public function internships(): BelongsToMany{
        return $this->belongsToMany(Internship::class);
    }
}