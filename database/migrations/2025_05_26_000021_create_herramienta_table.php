<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerramientaTable extends Migration
{
    public function up()
    {
        Schema::create('herramienta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('estado');
            $table->date('fecha_adquisicion')->nullable();
            $table->integer('horas_para_mantenimiento');
            $table->integer('horas_acumuladas')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
