<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearUsuarioTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('idUsuario');
            $table->integer('rutUsuario');
            $table->string('passUsuario');
            $table->string('nomUsuario', 60);
            $table->string('mailUsuario', 40);
            $table->integer('fonoUsuario');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('Estado_idEstado')->unsigned();
            $table->integer('Rol_idRol')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
