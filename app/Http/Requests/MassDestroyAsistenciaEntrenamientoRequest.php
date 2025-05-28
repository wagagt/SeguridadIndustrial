<?php

namespace App\Http\Requests;

use App\Models\AsistenciaEntrenamiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAsistenciaEntrenamientoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asistencia_entrenamiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asistencia_entrenamientos,id',
        ];
    }
}
