<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AutorLibro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_libro', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('autor_id')->references('id')->on('autores');
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
        Schema::drop('autor_libro');
    }
}
