<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaEntrenamientoDescripcionEntrenamientoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('asistencia_entrenamiento_descripcion_entrenamiento', function (Blueprint $table) {
            $table->unsignedBigInteger('asistencia_entrenamiento_id');
            $table->foreign('asistencia_entrenamiento_id', 'asistencia_entrenamiento_id_fk_10585408')->references('id')->on('asistencia_entrenamientos')->onDelete('cascade');
            $table->unsignedBigInteger('descripcion_entrenamiento_id');
            $table->foreign('descripcion_entrenamiento_id', 'descripcion_entrenamiento_id_fk_10585408')->references('id')->on('descripcion_entrenamientos')->onDelete('cascade');
        });
    }
}
