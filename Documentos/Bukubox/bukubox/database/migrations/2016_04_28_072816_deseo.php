<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Deseo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deseos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lector_id');
            $table->integer('libro_id');
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
        Schema::drop('deseos');
    }
}
