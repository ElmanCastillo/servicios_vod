<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForenkeyToReparto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repartos', function (Blueprint $table) {
            
            $table->unsignedBigInteger('actors_id'); 
            $table->foreign('actors_id')->references('id')->on('actors')
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->unsignedBigInteger('peliculas_id'); 
            $table->foreign('peliculas_id')->references('id')->on('peliculas')
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
        Schema::table('reparto', function (Blueprint $table) {
            //
        });
    }
}
