<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the class name
    protected $table = 'applicants';

    // Columns that are mass assignable
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
        'registration_date',
        'priority_area',
        'priority_group',
    ];

    /**
     * Define relationships with other models
     */

    // Relationship to Major
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }

    // Relationship to SchoolYear
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id', 'id');
    }

    // Relationship to SubjectBlock
    public function subjectBlock()
    {
        return $this->belongsTo(SubjectBlock::class, 'subject_block_id', 'id');
    }

    // Relationship to Province (if you have a Province model)
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
