<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAgregarEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('agregar_empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('cargo_id', 'cargo_fk_10586782')->references('id')->on('cargos');
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id', 'departamento_fk_10586783')->references('id')->on('departamentos');
        });
    }
}
