<?php

namespace App\Http\Requests;

use App\Models\AsistenciaEntrenamiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAsistenciaEntrenamientoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asistencia_entrenamiento_edit');
    }

    public function rules()
    {
        return [
            'entrenamientos.*' => [
                'integer',
            ],
            'entrenamientos' => [
                'array',
            ],
            'empleados.*' => [
                'integer',
            ],
            'empleados' => [
                'array',
            ],
        ];
    }
}
