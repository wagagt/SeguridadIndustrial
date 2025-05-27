<?php

namespace App\Http\Requests;

use App\Models\ContratoDocumento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContratoDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contrato_documento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contrato_documentos,id',
        ];
    }
}
