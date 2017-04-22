<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Caja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('cajas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lector_id')->references('id')->on('lectores');
            $table->integer('libro_id')->references('id')->on('libros');
            $table->string('estado_lectura');
            $table->integer('pag_leidas');
            $table->integer('calificacion');
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
        Schema::drop('cajas');
    }
}
