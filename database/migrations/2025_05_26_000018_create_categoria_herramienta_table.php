<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaHerramientaTable extends Migration
{
    public function up()
    {
        Schema::create('categoria_herramienta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_categoria')->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
