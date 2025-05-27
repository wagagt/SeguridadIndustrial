<?php

namespace App\Http\Requests;

use App\Models\UsoHerramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUsoHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('uso_herramientum_create');
    }

    public function rules()
    {
        return [
            'herramienta_id' => [
                'required',
                'integer',
            ],
            'empleado_id' => [
                'required',
                'integer',
            ],
            'contrato_id' => [
                'required',
                'integer',
            ],
            'fecha_inicio' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_fin' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'duracion_horas' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
