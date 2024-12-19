<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Nếu tên bảng là 'contacts', không cần định nghĩa $table vì Laravel tự động nhận dạng
    protected $fillable = ['name', 'email', 'message', 'file_path', 'applicant_id'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}
