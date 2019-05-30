<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearMantencionTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Clase Foranea
        Schema::create('mantencion', function (Blueprint $table) {
            $table->date('fechaMantencion');
            $table->text('descMantencion');
            $table->integer('Sala_idSala')->unsigned();
            $table->integer('Estado_idEstado')->unsigned();
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
        Schema::dropIfExists('mantencion');
    }
}
