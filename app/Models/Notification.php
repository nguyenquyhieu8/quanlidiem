<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Khai báo bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'notifications';

    // Khai báo các cột có thể gán giá trị mass assignment
    protected $fillable = [
        'title',
        'content',
        'publish_date',
        'expiry_date',
        'image',
        'video',
        'user_id',
    ];

    // Mối quan hệ với bảng `users`
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
