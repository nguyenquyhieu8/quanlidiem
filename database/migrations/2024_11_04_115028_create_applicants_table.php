<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string("code", 10);
            $table->integer('province_id');

            $table->string('full_name', 100); // Full name
            $table->date('date_of_birth'); // Date of birth
            $table->enum('gender', ['Male', 'Female', 'Other']); // Gender
            $table->string('email', 100)->unique(); // Email (unique)
            $table->string('phone_number', 15)->unique(); // Phone number
            $table->string('address', 255)->nullable(); // Address
            $table->string('school_code', 10); // School code
            $table->integer('major_id', 10)->nullable(); // Major code
            $table->float('admission_score')->nullable(); // Admission score
            $table->enum('status', ['Pending', 'Approved', 'Completed'])->default('Pending'); // Status
            $table->string('application_code', 20)->nullable(); // Application code
            $table->timestamp('registration_date')->useCurrent(); // Registration date
            $table->string('priority_area', 20)->nullable(); // Priority area
            $table->string('priority_group', 20)->nullable(); // Priority group
            $table->timestamps(); // Auto timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
