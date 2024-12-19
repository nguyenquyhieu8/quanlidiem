<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'province_id',
        'full_name',
        'date_of_birth',
        'gender',
        'email',
        'phone_number',
        'address',
        'school_code',
        'major_id',
        'school_year_id',
        'subject_block_id',
        'admission_score',
        'status',
        'application_code',
    ];

    // Quan hệ với bảng Province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Quan hệ với bảng Major
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    // Quan hệ với bảng SchoolYear
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    // Quan hệ với bảng SubjectBlock
    public function subjectBlock()
    {
        return $this->belongsTo(SubjectBlock::class);
    }
}
