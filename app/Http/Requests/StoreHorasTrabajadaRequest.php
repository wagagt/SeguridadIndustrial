<?php

namespace App\Http\Requests;

use App\Models\HorasTrabajada;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHorasTrabajadaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('horas_trabajada_create');
    }

    public function rules()
    {
        return [
            'empleado_id' => [
                'required',
                'integer',
            ],
            'contrato_laboral_id' => [
                'required',
                'integer',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'horas' => [
                'numeric',
                'required',
            ],
        ];
    }
}
