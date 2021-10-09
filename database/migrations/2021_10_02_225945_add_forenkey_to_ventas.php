<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForenkeyToVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->char('estado', 1)->nullable();
            $table->unsignedBigInteger('users_id'); 
            $table->foreign('users_id')->references('id')->on('users')
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->unsignedBigInteger('tipopagos_id'); 
            $table->foreign('tipopagos_id')->references('id')->on('tipopagos')
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
        Schema::table('ventas', function (Blueprint $table) {
            //
        });
    }
}
