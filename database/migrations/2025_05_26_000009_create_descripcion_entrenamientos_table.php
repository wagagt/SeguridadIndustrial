<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionEntrenamientosTable extends Migration
{
    public function up()
    {
        Schema::create('descripcion_entrenamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tema');
            $table->datetime('fecha');
            $table->string('instructor');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
