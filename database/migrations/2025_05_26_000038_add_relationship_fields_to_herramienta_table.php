<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHerramientaTable extends Migration
{
    public function up()
    {
        Schema::table('herramienta', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id', 'categoria_fk_10586794')->references('id')->on('categoria_herramienta');
        });
    }
}
