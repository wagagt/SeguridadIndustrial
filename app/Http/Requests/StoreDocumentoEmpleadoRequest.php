<?php

namespace App\Http\Requests;

use App\Models\DocumentoEmpleado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocumentoEmpleadoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('documento_empleado_create');
    }

    public function rules()
    {
        return [
            'empleado_id' => [
                'required',
                'integer',
            ],
            'tipo_documento' => [
                'required',
            ],
            'archivo' => [
                'array',
                'required',
            ],
            'archivo.*' => [
                'required',
            ],
            'fecha_emision' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_vencimiento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
