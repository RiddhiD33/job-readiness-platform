<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudentProfile extends Model
{

protected $fillable = [
    
'user_id',
'phone',
'current_city',
'cgpa',
'portfolio_url',
'resume_url',
'career_path_id',
'readiness_score',
'profile_status',

];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function careerPath(): BelongsTo{
        return $this->belongsTo(CareerPath::class);
    }

    public function projects(): HasMany{
        return $this->hasMany(Project::class);
    }

    public function internships(): HasMany{
        return $this->hasMany(Internship::class);
    }

    public function assessmentAttempts():HasMany{
        return $this->hasMany(AssessmentAttempt::class);
    }

    public function recruiterInterests():HasMany{
        return $this->hasMany(RecruiterInterest::class);
    }

    public function careerPathHistory(): HasMany{
        return $this->hasMany(CareerPathHistory::class);
    }

    public function skills(): BelongsToMany{
        return $this->belongsToMany(Skill::class);
    }


}
