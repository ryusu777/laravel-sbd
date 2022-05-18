<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderShuttleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shuttle', function (Blueprint $table) {
            $table->string('id_order', 15)->primary();
            $table->integer('id_travel_shuttle');
            
            $table->foreign('id_travel_shuttle', 'order_shuttle_ibfk_1')->references('id_travel_shuttle')->on('travel_shuttle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_shuttle');
    }
}
