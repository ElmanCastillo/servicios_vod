<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForenkeyToListapeliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listapeliculas', function (Blueprint $table) {
            $table->unsignedBigInteger('pelicula_id'); 
            $table->foreign('pelicula_id')->references('id')->on('peliculas')
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->unsignedBigInteger('venta_id'); 
            $table->foreign('venta_id')->references('id')->on('ventas')
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listapeliculas', function (Blueprint $table) {
            //
        });
    }
}
