<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContratoLaboralsTable extends Migration
{
    public function up()
    {
        Schema::table('contrato_laborals', function (Blueprint $table) {
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id', 'cliente_fk_10586792')->references('id')->on('agregar_clientes');
        });
    }
}
