<?php

namespace App\Http\Requests;

use App\Models\CategoriaHerramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCategoriaHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('categoria_herramientum_create');
    }

    public function rules()
    {
        return [
            'nombre_categoria' => [
                'string',
                'max:100',
                'required',
                'unique:categoria_herramienta',
            ],
            'descripcion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
