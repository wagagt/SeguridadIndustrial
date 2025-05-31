<?php

namespace App\Http\Requests;

use App\Models\EmpleadoContrato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEmpleadoContratoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('empleado_contrato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:empleado_contratos,id',
        ];
    }
}
