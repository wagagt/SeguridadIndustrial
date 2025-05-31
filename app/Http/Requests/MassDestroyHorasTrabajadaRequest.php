<?php

namespace App\Http\Requests;

use App\Models\HorasTrabajada;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHorasTrabajadaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('horas_trabajada_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:horas_trabajadas,id',
        ];
    }
}
