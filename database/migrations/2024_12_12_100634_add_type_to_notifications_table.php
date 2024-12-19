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
        $table->integer('type')->default(0); // Thêm cột type với giá trị mặc định là 1
        $table->foreignId('user_id')->nullable()->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('type'); // Xóa cột type
            $table->foreignId('user_id')->nullable(false)->change(); 
        });
    }
};
