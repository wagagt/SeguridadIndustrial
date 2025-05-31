<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsoHerramientaTable extends Migration
{
    public function up()
    {
        Schema::table('uso_herramienta', function (Blueprint $table) {
            $table->unsignedBigInteger('herramienta_id')->nullable();
            $table->foreign('herramienta_id', 'herramienta_fk_10586803')->references('id')->on('herramienta');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'empleado_fk_10586804')->references('id')->on('agregar_empleados');
            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->foreign('contrato_id', 'contrato_fk_10586805')->references('id')->on('contrato_laborals');
        });
    }
}
