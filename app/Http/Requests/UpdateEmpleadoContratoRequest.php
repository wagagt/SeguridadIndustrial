<?php

namespace App\Http\Requests;

use App\Models\EmpleadoContrato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmpleadoContratoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('empleado_contrato_edit');
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
            'fecha_asignacion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_retiro' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
