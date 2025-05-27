<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorasTrabajadasTable extends Migration
{
    public function up()
    {
        Schema::create('horas_trabajadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->float('horas', 6, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
