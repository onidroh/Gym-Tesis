<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearClaseTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clase', function (Blueprint $table) {
            $table->bigIncrements('idClase');
            $table->date('fechaClase')->unique();
            $table->timestamps();
            $table->integer('Sala_idSala')->unsigned();
            $table->integer('Hora_idHora')->unsigned();
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
        Schema::dropIfExists('clase');
    }
}
