<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatkulMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matkul__mahasiswas', function (Blueprint $table) {
            $table->increments('id');
              $table->unsignedInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('CASCADE'); 

            $table->unsignedInteger('id_matakuliah');
            $table->foreign('id_matakuliah')->references('id')->on('mata_kuliahs')->onDelete('CASCADE'); 

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
        Schema::dropIfExists('matkul__mahasiswas');
    }
}
