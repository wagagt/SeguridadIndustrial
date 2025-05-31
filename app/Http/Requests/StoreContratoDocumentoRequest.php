<?php

namespace App\Http\Requests;

use App\Models\ContratoDocumento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContratoDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contrato_documento_create');
    }

    public function rules()
    {
        return [
            'tipo_documento' => [
                'required',
            ],
            'fecha_subida' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
