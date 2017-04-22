<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Libro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function(Blueprint $table) {
            $table->increments('id');
            $table->string('isbn')->nullable();
            $table->string('titulo');
            $table->string('url_portada');
            $table->integer('paginas')->nullable();
            $table->text('sinopsis')->nullable();
            $table->string('editorial')->nullable();
            $table->string('edicion')->nullable();
            $table->string('idioma');
            $table->string('forma');
            $table->date('fecha_publicacion')->nullable();
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
        Schema::drop('libros');
    }
}
