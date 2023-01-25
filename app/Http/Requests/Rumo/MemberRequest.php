<?php

namespace App\Http\Requests\Rumo;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'course_leader_id' => ['required', 'numeric'],
            'person_id' => ['required', 'string'],
            "information" => ['nullable', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'course_leader_id' => 'identificador do monitor',
            'person_id' => 'identificador do cursista',
            "information" => 'informação',
        ];
    }
}
