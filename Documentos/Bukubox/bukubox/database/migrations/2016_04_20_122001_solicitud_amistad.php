<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SolicitudAmistad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_amistad', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lector_emisor_id')->references('id')->on('lectores');
            $table->integer('lector_receptor_id');
            $table->datetime('fecha_solicitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('solicitud_amistad');
    }
}
