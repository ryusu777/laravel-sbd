<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeberangkatanShuttleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keberangkatan_shuttle', function (Blueprint $table) {
            $table->integer('id_keberangkatan')->primary();
            $table->integer('id_travel_shuttle');
            $table->time('waktu_berangkat');
            $table->time('perkiraan_tiba');
            $table->date('hari_berangkat');
            
            $table->foreign('id_travel_shuttle', 'keberangkatan_shuttle_ibfk_1')->references('id_travel_shuttle')->on('travel_shuttle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keberangkatan_shuttle');
    }
}
