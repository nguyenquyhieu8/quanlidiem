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
        Schema::create('cutoff_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('major_id')->constrained('majors')->onDelete('cascade'); // Khóa ngoại đến bảng majors
            $table->foreignId('subject_block_id')->constrained('subject_blocks')->onDelete('cascade'); // Khóa ngoại đến bảng subject_blocks
            $table->foreignId('school_year_id')->constrained('school_years')->onDelete('cascade'); // Khóa ngoại đến bảng school_years
            $table->decimal('score', 5, 2); // Điểm chuẩn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutoff_scores');
    }
};
