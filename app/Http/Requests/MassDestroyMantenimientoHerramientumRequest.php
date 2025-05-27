<?php

namespace App\Http\Requests;

use App\Models\MantenimientoHerramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMantenimientoHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mantenimiento_herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mantenimiento_herramienta,id',
        ];
    }
}
