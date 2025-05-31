<?php

namespace App\Http\Requests;

use App\Models\Instructor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInstructorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('instructor_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:255',
                'required',
            ],
            'correo_electronico' => [
                'required',
            ],
            'telefono' => [
                'string',
                'max:20',
                'required',
            ],
        ];
    }
}
