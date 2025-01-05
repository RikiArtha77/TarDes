<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operator_id')->unique();
            $table->string('nama_kepala_keluarga')->nullable();
            $table->string('nik')->nullable();
            $table->string('kk')->nullable();
            $table->unsignedBigInteger('pekerjaan_id')->nullable();
            $table->text('alamat')->nullable();
            $table->unsignedBigInteger('komunitas_id')->nullable();
            $table->unsignedBigInteger('banjar_id')->nullable();
            $table->string('foto_kk')->nullable();
            $table->string('foto_rumah')->nullable();
            $table->integer('jumlah_keluarga')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();

            // Relasi foreign key
            $table->foreign('operator_id')->references('operator_id')->on('operators');
            $table->foreign('pekerjaan_id')->references('pekerjaan_id')->on('pekerjaan');
            $table->foreign('komunitas_id')->references('komunitas_id')->on('komunitas');
            $table->foreign('banjar_id')->references('banjar_id')->on('banjar');
        });
    }

    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}