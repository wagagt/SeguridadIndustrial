<?php

namespace App\Http\Requests;

use App\Models\DescripcionEntrenamiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDescripcionEntrenamientoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('descripcion_entrenamiento_edit');
    }

    public function rules()
    {
        return [
            'tema' => [
                'string',
                'max:150',
                'required',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'instructor' => [
                'string',
                'required',
            ],
        ];
    }
}
