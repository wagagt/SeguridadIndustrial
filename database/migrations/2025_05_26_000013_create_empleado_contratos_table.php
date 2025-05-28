<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoContratosTable extends Migration
{
    public function up()
    {
        Schema::create('empleado_contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_asignacion');
            $table->date('fecha_retiro')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
