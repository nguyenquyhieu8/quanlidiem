<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $table = "majors";

    protected $fillable = [
        'major_name',
        'subject_block_id',
        'major_code'
    ];

    // Định nghĩa mối quan hệ với bảng CutoffScore
    public function cutoffScores()
    {
        return $this->hasMany(CutoffScore::class, 'major_id', 'id');
    }
}
