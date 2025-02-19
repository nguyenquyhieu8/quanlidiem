<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('contact', 'contacts'); // Đổi tên bảng từ 'contact' thành 'contacts'
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('contacts', 'contact'); // Đổi lại nếu rollback
    }
};
