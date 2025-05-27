<?php

namespace App\Http\Requests;

use App\Models\AsistenciaCharla;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAsistenciaCharlaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asistencia_charla_edit');
    }

    public function rules()
    {
        return [
            'charlas.*' => [
                'integer',
            ],
            'charlas' => [
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
