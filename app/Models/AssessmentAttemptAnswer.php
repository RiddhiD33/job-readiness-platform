<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssessmentAttemptAnswer extends Model
{
    protected $fillable = [
        'assessment_attempt_id',
        'assessment_question_id',
        'answer',
        'score',
    ];
    
    public function assessmentAttempt(): BelongsTo{
        return $this->belongsTo(AssessmentAttempt::class);
    }

    public function assessmentQuestion(): BelongsTo{
        return $this->belongsTo(AssessmentQuestion::class);
    }
}
