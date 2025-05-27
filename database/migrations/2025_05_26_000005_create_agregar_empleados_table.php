<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregarEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('agregar_empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_completo');
            $table->string('numero_identificacion')->unique();
            $table->string('codigo_seguridad_social')->nullable();
            $table->date('fecha_ingreso');
            $table->longText('otros_datos_personales')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
