<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectores', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('url_avatar')->nullable();
            $table->string('nota')->nullable();
            $table->integer('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lectores');
    }
}
