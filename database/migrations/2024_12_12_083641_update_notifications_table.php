<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->date('publish_date')->nullable()->change(); // Thay đổi để có thể null
            $table->date('expiry_date')->nullable()->change(); // Thay đổi để có thể null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->date('publish_date')->nullable(false)->change(); // Trở lại không null
            $table->date('expiry_date')->nullable(false)->change(); // Trở lại không null
        });
    }
};
