<?php

namespace App\Http\Requests\Rumo;

use Illuminate\Foundation\Http\FormRequest;

class OrientationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "course_id" => ['required', 'string'],
            "role_id" => ['required', 'numeric'],
            "person_id" => ['required', 'string'],
            "information" => ['nullable', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'course_id' => 'curso',
            'role_id' => 'função',
            'person_id' => 'pessoa',
            'information' => 'informação',
        ];
    }
}
