<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContratoDocumentosTable extends Migration
{
    public function up()
    {
        Schema::table('contrato_documentos', function (Blueprint $table) {
            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->foreign('contrato_id', 'contrato_fk_10585417')->references('id')->on('contrato_laborals');
        });
    }
}
