<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Amistad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amistad', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lector1_id');
            $table->integer('lector2_id');
            $table->datetime('fecha_registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('amistad');
    }
}
