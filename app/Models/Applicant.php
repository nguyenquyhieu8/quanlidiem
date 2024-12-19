<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'dob',
        'email',
        'phone',
        'school_year_id',
        'major_id',
        'subject_block_id',
        'score',
        'province_id'
    ];

    // Định nghĩa mối quan hệ đến bảng SchoolYear
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    // Định nghĩa mối quan hệ đến bảng Major
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    // Định nghĩa mối quan hệ đến bảng SubjectBlock
    public function subjectBlock()
    {
        return $this->belongsTo(SubjectBlock::class, 'subject_block_id');
    }
}
