<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregarEmpleadoAsistenciaCharlaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agregar_empleado_asistencia_charla', function (Blueprint $table) {
            $table->unsignedBigInteger('asistencia_charla_id');
            $table->foreign('asistencia_charla_id', 'asistencia_charla_id_fk_10585411')->references('id')->on('asistencia_charlas')->onDelete('cascade');
            $table->unsignedBigInteger('agregar_empleado_id');
            $table->foreign('agregar_empleado_id', 'agregar_empleado_id_fk_10585411')->references('id')->on('agregar_empleados')->onDelete('cascade');
        });
    }
}
