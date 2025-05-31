<?php

namespace App\Http\Requests;

use App\Models\ContratoLaboral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContratoLaboralRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contrato_laboral_create');
    }

    public function rules()
    {
        return [
            'numero_contrato' => [
                'string',
                'max:50',
                'required',
                'unique:contrato_laborals',
            ],
            'fecha_inicio' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_fin' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'estado' => [
                'required',
            ],
            'cliente_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
