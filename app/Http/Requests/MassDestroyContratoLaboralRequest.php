<?php

namespace App\Http\Requests;

use App\Models\ContratoLaboral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContratoLaboralRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contrato_laboral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contrato_laborals,id',
        ];
    }
}
