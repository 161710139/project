<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('nis');
            $table->unsignedInteger('id_dosen');
            $table->foreign('id_dosen')->references('id')->on('dosens')->onDelete('CASCADE'); 
            $table->unsignedInteger('id_jurusan');
            $table->foreign('id_jurusan')->references('id')->on('jurusans')->onDelete('CASCADE'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
