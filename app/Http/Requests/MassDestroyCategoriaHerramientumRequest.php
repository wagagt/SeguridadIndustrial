<?php

namespace App\Http\Requests;

use App\Models\CategoriaHerramientum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCategoriaHerramientumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('categoria_herramientum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:categoria_herramienta,id',
        ];
    }
}
