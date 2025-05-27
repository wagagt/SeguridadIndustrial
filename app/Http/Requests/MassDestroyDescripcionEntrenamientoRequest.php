<?php

namespace App\Http\Requests;

use App\Models\DescripcionEntrenamiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDescripcionEntrenamientoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('descripcion_entrenamiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:descripcion_entrenamientos,id',
        ];
    }
}
