<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoDocumentosTable extends Migration
{
    public function up()
    {
        Schema::create('contrato_documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_documento');
            $table->date('fecha_subida');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
