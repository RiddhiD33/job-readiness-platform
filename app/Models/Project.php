<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = [
        'student_profile_id',
        'title',
        'description',
        'project_type',
        'github_link',
        'demo_link',
        'status',
    ];
    public function studentProfile(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class,'project_skills');
    }
}