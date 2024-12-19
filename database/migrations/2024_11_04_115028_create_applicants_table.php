<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('school_code')->nullable();
            $table->unsignedBigInteger('major_id');
            $table->unsignedBigInteger('school_year_id');
            $table->unsignedBigInteger('subject_block_id');
            $table->decimal('admission_score', 8, 2)->nullable();
            $table->string('status')->default('pending');
            $table->string('application_code')->nullable();
           

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
            $table->foreign('school_year_id')->references('id')->on('school_years')->onDelete('cascade');
            $table->foreign('subject_block_id')->references('id')->on('subject_blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
