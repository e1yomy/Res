<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cuenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('rol');
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
        Schema::drop('cuentas');
    }
}
