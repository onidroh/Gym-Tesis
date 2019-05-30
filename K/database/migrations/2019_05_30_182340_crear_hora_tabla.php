<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearHoraTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hora', function (Blueprint $table) {
            $table->bigIncrements('idHora');
            $table->time('hora_iniHora');
            $table->time('hora_finHora');
            $table->string('diaHora', 10)->unique();
            $table->timestamps();
            $table->integer('Usuario_idUsuario')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hora');
    }
}
