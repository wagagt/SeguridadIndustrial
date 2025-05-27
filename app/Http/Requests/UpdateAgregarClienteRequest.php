<?php

namespace App\Http\Requests;

use App\Models\AgregarCliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAgregarClienteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agregar_cliente_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:100',
                'required',
            ],
            'nombre_encargado' => [
                'string',
                'max:100',
                'required',
            ],
            'telefono' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'correo' => [
                'required',
            ],
            'direccion' => [
                'string',
                'max:100',
                'required',
            ],
        ];
    }
}
