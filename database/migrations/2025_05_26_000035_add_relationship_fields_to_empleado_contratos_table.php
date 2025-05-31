<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmpleadoContratosTable extends Migration
{
    public function up()
    {
        Schema::table('empleado_contratos', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'empleado_fk_10585323')->references('id')->on('agregar_empleados');
            $table->unsignedBigInteger('contrato_laboral_id')->nullable();
            $table->foreign('contrato_laboral_id', 'contrato_laboral_fk_10585324')->references('id')->on('contrato_laborals');
        });
    }
}
