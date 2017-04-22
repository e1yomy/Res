<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LibroGenero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_genero', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('genero_id')->references('id')->on('generos');
            $table->integer('libro_id')->references('id')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('libro_genero');
    }
}
