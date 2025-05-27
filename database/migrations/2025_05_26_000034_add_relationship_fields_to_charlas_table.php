<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCharlasTable extends Migration
{
    public function up()
    {
        Schema::table('charlas', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->foreign('instructor_id', 'instructor_fk_10586517')->references('id')->on('instructors');
        });
    }
}
