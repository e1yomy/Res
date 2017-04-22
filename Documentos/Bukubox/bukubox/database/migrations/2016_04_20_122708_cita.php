<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lector_id')->references('id')->on('lectores');
            $table->integer('libro_id')->references('id')->on('libros');
            $table->text('texto');
            $table->integer('no_pagina');
            $table->string('capitulo');
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
        Schema::drop('citas');
    }
}
