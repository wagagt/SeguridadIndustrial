<?php

namespace App\Http\Requests;

use App\Models\UsoHerramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUsoHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('uso_herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:uso_herramienta,id',
        ];
    }
}
