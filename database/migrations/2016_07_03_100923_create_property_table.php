<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('description');
            $table->integer('property_type_id');
            $table->string('legal_ownership');
            $table->string('availability');
            $table->boolean('display')->default(false);
            $table->decimal('value', 16, 4)->nullable();
            $table->decimal('asking_value', 16, 4)->nullable();
            $table->decimal('sold_for', 16, 4)->nullable();
            $table->string('status')->default('new');
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
        Schema::drop('property');
    }
}
