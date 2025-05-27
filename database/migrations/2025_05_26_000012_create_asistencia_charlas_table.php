<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaCharlasTable extends Migration
{
    public function up()
    {
        Schema::create('asistencia_charlas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('presente')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
