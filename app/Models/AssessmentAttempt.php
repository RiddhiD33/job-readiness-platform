<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssessmentAttempt extends Model
{
    protected $fillable = [
           'student_profile_id',
           'assessment_id',
           'score',
    ];
    public function studentProfile(): BelongsTo{
        return $this->belongsTo(StudentProfile::class);
    }

    public function assessment(): BelongsTo{
        return $this->belongsTo(Assessment::class);
    }

    public function assessmentAttemptAnswers(): HasMany{
        return $this->hasMany(AssessmentAttemptAnswer::class);
    }
}
