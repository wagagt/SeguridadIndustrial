<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoHerramientaTable extends Migration
{
    public function up()
    {
        Schema::create('mantenimiento_herramienta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_mantenimiento');
            $table->date('fecha_mantenimiento');
            $table->string('descripcion')->nullable();
            $table->string('resultado')->nullable();
            $table->boolean('notificado')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
