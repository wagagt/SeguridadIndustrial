<?php

namespace App\Http\Requests;

use App\Models\AgregarEmpleado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAgregarEmpleadoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agregar_empleado_edit');
    }

    public function rules()
    {
        return [
            'nombre_completo' => [
                'string',
                'max:150',
                'required',
            ],
            'numero_identificacion' => [
                'string',
                'max:50',
                'required',
                'unique:agregar_empleados,numero_identificacion,' . request()->route('agregar_empleado')->id,
            ],
            'codigo_seguridad_social' => [
                'string',
                'max:50',
                'nullable',
            ],
            'fecha_ingreso' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
