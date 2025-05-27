<?php

namespace App\Http\Requests;

use App\Models\ReciboPago;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReciboPagoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('recibo_pago_edit');
    }

    public function rules()
    {
        return [
            'empleado_id' => [
                'required',
                'integer',
            ],
            'numero_recibo' => [
                'string',
                'max:50',
                'required',
                'unique:recibo_pagos,numero_recibo,' . request()->route('recibo_pago')->id,
            ],
            'fecha_emision' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'periodo_fin' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'salario_base' => [
                'numeric',
                'required',
            ],
            'horas_trabajadas' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pago_horas_extras' => [
                'numeric',
            ],
            'total_bonificaciones' => [
                'numeric',
            ],
            'total_comisiones' => [
                'numeric',
            ],
            'otros_ingresos' => [
                'numeric',
            ],
            'descuento_igss' => [
                'numeric',
            ],
            'descuento_isr' => [
                'numeric',
            ],
            'descuentos_prestamos' => [
                'numeric',
            ],
            'descuentos_faltas_retardos' => [
                'numeric',
            ],
            'otros_descuentos' => [
                'numeric',
            ],
            'total_ingresos' => [
                'numeric',
                'required',
            ],
            'total_deducciones' => [
                'numeric',
                'required',
            ],
            'salario_neto' => [
                'numeric',
                'required',
            ],
            'metodo_pago' => [
                'required',
            ],
            'banco' => [
                'string',
                'max:50',
                'nullable',
            ],
            'numero_cuenta' => [
                'string',
                'nullable',
            ],
            'observaciones' => [
                'string',
                'nullable',
            ],
            'numero_contrato_laboral' => [
                'string',
                'max:50',
                'nullable',
            ],
            'recibo_pago' => [
                'array',
            ],
        ];
    }
}
