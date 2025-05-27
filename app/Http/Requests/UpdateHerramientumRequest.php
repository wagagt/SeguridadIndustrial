<?php

namespace App\Http\Requests;

use App\Models\Herramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('herramientum_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:150',
                'required',
            ],
            'descripcion' => [
                'string',
                'nullable',
            ],
            'estado' => [
                'required',
            ],
            'fecha_adquisicion' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'horas_para_mantenimiento' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'horas_acumuladas' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
