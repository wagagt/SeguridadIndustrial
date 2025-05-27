<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregarEmpleadoAsistenciaEntrenamientoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agregar_empleado_asistencia_entrenamiento', function (Blueprint $table) {
            $table->unsignedBigInteger('asistencia_entrenamiento_id');
            $table->foreign('asistencia_entrenamiento_id', 'asistencia_entrenamiento_id_fk_10585409')->references('id')->on('asistencia_entrenamientos')->onDelete('cascade');
            $table->unsignedBigInteger('agregar_empleado_id');
            $table->foreign('agregar_empleado_id', 'agregar_empleado_id_fk_10585409')->references('id')->on('agregar_empleados')->onDelete('cascade');
        });
    }
}
