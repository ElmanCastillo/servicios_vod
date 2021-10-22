<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForenkeyToSuscriptores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suscriptores', function (Blueprint $table) {
            $table->char('estado', 1)->nullable();
            $table->unsignedBigInteger('users_id'); 
            $table->foreign('users_id')->references('id')->on('users')
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
        Schema::table('suscriptores', function (Blueprint $table) {
            //
        });
    }
}
