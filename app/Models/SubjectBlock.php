<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectBlock extends Model
{
    use HasFactory;
    protected $table = "subject_blocks";
    protected $fillable = [
        'description',
        'block_name'
    ];
}
