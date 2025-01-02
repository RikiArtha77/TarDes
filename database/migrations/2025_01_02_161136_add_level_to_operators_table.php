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
    Schema::table('operators', function (Blueprint $table) {
        $table->integer('level')->default(1); // 1 for normal users, 2 for operators
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operators', function (Blueprint $table) {
            //
        });
    }
};
