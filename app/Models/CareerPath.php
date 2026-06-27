<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CareerPath extends Model
{
    protected $fillable = [
        'name',
        'description',
    ]; 

    public function studentProfiles() : HasMany{
        return $this->hasMany(StudentProfile::class);
    }

    public function assessments() : HasMany{
        return $this->hasMany(Assessment::class);
    }

    public function skills() : BelongsToMany{
        return $this->belongsToMany(Skill::class,'career_path_skills','career_path_id',
        'skill_id');
    }
}
