<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('documento_empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_documento');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
