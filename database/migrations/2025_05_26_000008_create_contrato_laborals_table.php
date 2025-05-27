<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoLaboralsTable extends Migration
{
    public function up()
    {
        Schema::create('contrato_laborals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_contrato')->unique();
            $table->longText('descripcion')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('estado');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
