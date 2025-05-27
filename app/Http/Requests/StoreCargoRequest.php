<?php

namespace App\Http\Requests;

use App\Models\Cargo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCargoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cargo_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:100',
                'required',
            ],
            'descripcion' => [
                'string',
                'max:150',
                'required',
            ],
        ];
    }
}
