<?php

namespace App\Http\Requests;

use App\Models\MantenimientoHerramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMantenimientoHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mantenimiento_herramientum_create');
    }

    public function rules()
    {
        return [
            'herramienta_id' => [
                'required',
                'integer',
            ],
            'tipo_mantenimiento' => [
                'required',
            ],
            'fecha_mantenimiento' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'descripcion' => [
                'string',
                'nullable',
            ],
            'resultado' => [
                'string',
                'nullable',
            ],
        ];
    }
}
