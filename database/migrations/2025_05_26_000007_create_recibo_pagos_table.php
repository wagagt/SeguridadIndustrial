<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReciboPagosTable extends Migration
{
    public function up()
    {
        Schema::create('recibo_pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_recibo')->unique();
            $table->date('fecha_emision');
            $table->date('periodo_fin');
            $table->float('salario_base', 10, 2);
            $table->integer('horas_trabajadas')->nullable();
            $table->float('pago_horas_extras', 10, 2)->nullable();
            $table->float('total_bonificaciones', 10, 2)->nullable();
            $table->float('total_comisiones', 10, 2)->nullable();
            $table->float('otros_ingresos', 10, 2)->nullable();
            $table->float('descuento_igss', 10, 2)->nullable();
            $table->float('descuento_isr', 10, 2)->nullable();
            $table->float('descuentos_prestamos', 10, 2)->nullable();
            $table->float('descuentos_faltas_retardos', 10, 2)->nullable();
            $table->float('otros_descuentos', 10, 2)->nullable();
            $table->float('total_ingresos', 10, 2);
            $table->float('total_deducciones', 10, 2);
            $table->float('salario_neto', 10, 2);
            $table->string('metodo_pago');
            $table->string('banco')->nullable();
            $table->string('numero_cuenta')->nullable();
            $table->string('observaciones')->nullable();
            $table->boolean('firma_empleado')->default(0)->nullable();
            $table->boolean('firma_rrhh')->default(0)->nullable();
            $table->string('numero_contrato_laboral')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
