<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregarClientesTable extends Migration
{
    public function up()
    {
        Schema::create('agregar_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('nombre_encargado');
            $table->integer('telefono');
            $table->string('correo');
            $table->string('direccion');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
