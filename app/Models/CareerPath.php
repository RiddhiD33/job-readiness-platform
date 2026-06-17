<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CareerPath extends Model
{
    public function studentProfiles() : HasMany{
        return $this->hasMany(StudentProfile::class);
    }

    public function assessments() : HasMany{
        return $this->hasMany(Assessments::class);
    }

    public function skills() : BelongsToMany{
        return $this->belongsToMany(Skills::class);
    }
}
