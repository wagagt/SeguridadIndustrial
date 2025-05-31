<?php

namespace App\Http\Requests;

use App\Models\CategoriaHerramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoriaHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('categoria_herramientum_edit');
    }

    public function rules()
    {
        return [
            'nombre_categoria' => [
                'string',
                'max:100',
                'required',
                'unique:categoria_herramienta,nombre_categoria,' . request()->route('categoria_herramientum')->id,
            ],
            'descripcion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
