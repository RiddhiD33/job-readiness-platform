<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssessmentQuestion extends Model
{
    protected $fillable = [
        'assessment_id',
        'question_type',
        'question',
        'options',
        'correct_answer',
    ];

    protected $casts = [
        'options' => 'array',
    ];
    
    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class);
    }

    public function assessmentAttemptAnswers(): HasMany
    {
        return $this->hasMany(AssessmentAttemptAnswer::class);
    }
}