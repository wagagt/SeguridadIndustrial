<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocumentoEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('documento_empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'empleado_fk_10584404')->references('id')->on('agregar_empleados');
        });
    }
}
