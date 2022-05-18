<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->integer('id_anggota')->primary();
            $table->string('nama', 50);
            $table->integer('kd_gol');
            $table->integer('kd_bidang');
            
            $table->foreign('kd_gol', 'anggota_ibfk_1')->references('kd_gol')->on('golongan');
            $table->foreign('kd_bidang', 'anggota_ibfk_2')->references('kd_bidang')->on('bidang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
