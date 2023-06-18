<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function faculty(): BelongsTo{
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
    public function subject(): BelongsTo {
        return $this->belongsTo(Subject::class,'semester_id','id');
    }
    public function section(): HasMany{
        return $this->hasMany(Section::class,'semester_id','id');
    }
}
