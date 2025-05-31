<?php

namespace App\Http\Requests;

use App\Models\Charla;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCharlaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('charla_create');
    }

    public function rules()
    {
        return [
            'tema' => [
                'string',
                'max:150',
                'required',
            ],
            'instructor_id' => [
                'required',
                'integer',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
