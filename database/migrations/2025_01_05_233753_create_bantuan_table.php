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
        Schema::create('bantuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operator_id');
            $table->json('choices'); // Menyimpan pilihan checkbox
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('bantuan');
    }
};
