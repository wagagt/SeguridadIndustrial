<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharlasTable extends Migration
{
    public function up()
    {
        Schema::create('charlas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tema');
            $table->date('fecha');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
