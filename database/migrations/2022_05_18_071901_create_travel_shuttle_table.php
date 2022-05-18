<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelShuttleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_shuttle', function (Blueprint $table) {
            $table->integer('id_travel_shuttle');
            $table->integer('id_titik_shuttle_a');
            $table->integer('id_titik_shuttle_b');
            $table->integer('id_shuttle');
            $table->integer('harga_travel');
            
            $table->primary(['id_travel_shuttle', 'id_titik_shuttle_a', 'id_titik_shuttle_b', 'id_shuttle']);
            $table->foreign('id_titik_shuttle_a', 'travel_shuttle_ibfk_1')->references('id_titik_shuttle')->on('titik_shuttle');
            $table->foreign('id_titik_shuttle_b', 'travel_shuttle_ibfk_2')->references('id_titik_shuttle')->on('titik_shuttle');
            $table->foreign('id_shuttle', 'travel_shuttle_ibfk_3')->references('id_shuttle')->on('shuttle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_shuttle');
    }
}
