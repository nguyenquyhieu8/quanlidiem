<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutoffScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_year_id',
        'major_id',
        'subject_block_id',
        'score',
    ];

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function subjectBlock()
    {
        return $this->belongsTo(SubjectBlock::class, 'subject_block_id'); // Định nghĩa quan hệ với SubjectBlock
    }
}
