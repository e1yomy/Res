<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Patrocinadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrocinadores', function(Blueprint $table) {
            $table->increments('id');
            $table->string('url_imagen');
            $table->string('url_pagina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patrocinadores');
    }
}
