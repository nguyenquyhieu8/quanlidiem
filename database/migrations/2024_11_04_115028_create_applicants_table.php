<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên thí sinh
            $table->date('dob'); // Ngày sinh
            $table->string('email')->unique(); // Email của thí sinh
            $table->string('phone')->unique(); // Số điện thoại
            $table->foreignId('school_year_id')->constrained('school_years')->onDelete('cascade'); // Năm học
            $table->foreignId('major_id')->constrained('majors')->onDelete('cascade'); // Ngành học
            $table->foreignId('subject_block_id')->constrained('subject_blocks')->onDelete('cascade'); // Khối thi

            $table->decimal('score', 5, 2); // Điểm xét tuyển của thí sinh
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
