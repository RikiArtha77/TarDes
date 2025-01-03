<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')->constrained()->onDelete('cascade');
            $table->string('nama_kepala_keluarga');
            $table->string('nik');
            $table->string('kk');
            $table->unsignedBigInteger('pekerjaan_id');
            $table->foreignId('komunitas_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('banjar_id');
            $table->string('alamat');
            $table->string('foto_kk')->nullable();
            $table->string('foto_rumah')->nullable();
            $table->integer('jumlah_keluarga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
