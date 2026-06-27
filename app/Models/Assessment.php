<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assessment extends Model
{
    protected $fillable = [
        'career_path_id',
        'title',
    ];
    public function careerPath(): BelongsTo{
        return $this->belongsTo(CareerPath::class);
    }

    public function assessmentQuestions(): HasMany{
        return $this->hasMany(AssessmentQuestion::class);
    }

    public function assessmentAttempts(): HasMany{
        return $this->hasMany(AssessmentAttempt::class);
    }
}