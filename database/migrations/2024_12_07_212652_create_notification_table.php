<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('title');
            $table->string('content');
            $table->date('publish_date');
            $table->date('expiry_date');
            $table->binary('image')->nullable();
            $table->binary('video')->nullable();
            $table->timestamps(); // Các trường created_at, updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification');
    }
};
