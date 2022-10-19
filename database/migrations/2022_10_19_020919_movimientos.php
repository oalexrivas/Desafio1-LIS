<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTipo');
            $table->boolean('tipo'); //1: Entradas 0:Salidas
            $table->decimal('monto', 16, 2);
            $table->dateTime('fecha');
            $table->string('Adjunto');
            $table->timestamps();
            $table->foreign('idTipo')->references('id')->on('tiposmovimientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
