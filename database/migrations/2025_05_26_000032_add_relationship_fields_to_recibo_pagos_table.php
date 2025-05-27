<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReciboPagosTable extends Migration
{
    public function up()
    {
        Schema::table('recibo_pagos', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'empleado_fk_10584413')->references('id')->on('agregar_empleados');
        });
    }
}
