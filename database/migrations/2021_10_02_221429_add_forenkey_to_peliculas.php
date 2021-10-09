<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForenkeyToPeliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('genero_id'); 
            $table->foreign('genero_id')->references('id')->on('generos')
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->unsignedBigInteger('director_id'); 
            $table->foreign('director_id')->references('id')->on('directors')
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
        Schema::table('peliculas', function (Blueprint $table) {
            //
        });
    }
}
