<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_type_id');
            $table->integer('property_id');
            $table->float('long_length')->nullable(); 
            $table->float('long_width')->nullable();
            $table->float('square_foot')->nullable(); 
            $table->mediumText('map')->nullable();
            $table->string('description')->nullable();
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
        Schema::drop('room');
    }
}
