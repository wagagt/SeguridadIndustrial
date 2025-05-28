<?php

namespace App\Http\Requests;

use App\Models\DocumentoEmpleado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocumentoEmpleadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documento_empleado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:documento_empleados,id',
        ];
    }
}
