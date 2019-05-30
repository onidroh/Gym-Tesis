<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearReservaTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reserva', function (Blueprint $table) {
            $table->bigIncrements('idReserva');
            $table->date('fechaReserva');
            $table->integer('Usuario_idUsuario')->unsigned();
            $table->integer('Clase_idClase')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('reserva');
    }
}
