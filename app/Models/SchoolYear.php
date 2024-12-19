<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_year',
        'end_year',
    ];

    /**
     * Thiết lập quan hệ một-nhiều với bảng `cutoff_scores`
     * Mỗi năm học có thể có nhiều điểm chuẩn cho các ngành học.
     */
    public function cutoffScores()
    {
        return $this->hasMany(CutoffScore::class);
    }

    /**
     * Thiết lập quan hệ một-nhiều với bảng `applicants`
     * Mỗi năm học có thể có nhiều thí sinh đăng ký tuyển sinh.
     */
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    /**
     * Tạo một phương thức để lấy năm học dưới dạng chuỗi
     * Ví dụ: "2023-2024"
     */
    public function getSchoolYearRangeAttribute()
    {
        return "{$this->start_year}-{$this->end_year}";
    }
}
