<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMantenimientoHerramientaTable extends Migration
{
    public function up()
    {
        Schema::table('mantenimiento_herramienta', function (Blueprint $table) {
            $table->unsignedBigInteger('herramienta_id')->nullable();
            $table->foreign('herramienta_id', 'herramienta_fk_10586813')->references('id')->on('herramienta');
        });
    }
}
