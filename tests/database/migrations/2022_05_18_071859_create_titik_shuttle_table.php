<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitikShuttleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titik_shuttle', function (Blueprint $table) {
            $table->integer('id_titik_shuttle')->primary();
            $table->string('nama_titik_shuttle', 50)->nullable();
            $table->integer('id_kota');
            
            $table->foreign('id_kota', 'titik_shuttle_ibfk_1')->references('id_kota')->on('kota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titik_shuttle');
    }
}
