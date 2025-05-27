<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaCharlaCharlaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('asistencia_charla_charla', function (Blueprint $table) {
            $table->unsignedBigInteger('asistencia_charla_id');
            $table->foreign('asistencia_charla_id', 'asistencia_charla_id_fk_10585410')->references('id')->on('asistencia_charlas')->onDelete('cascade');
            $table->unsignedBigInteger('charla_id');
            $table->foreign('charla_id', 'charla_id_fk_10585410')->references('id')->on('charlas')->onDelete('cascade');
        });
    }
}
