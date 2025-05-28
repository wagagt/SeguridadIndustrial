<?php

namespace App\Http\Requests;

use App\Models\ReciboPago;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReciboPagoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('recibo_pago_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:recibo_pagos,id',
        ];
    }
}
