<?php

namespace App\Http\Requests\Rumo;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "community_id" => ['required', 'numeric'],
            "type_id" => ['required', 'numeric'],
            "number" => ['required', 'numeric'],
            "starts_at" => ['required', 'date', ],
            "ends_at" => ['required', 'date'],
            "information" => ['nullable', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'community_id' => 'secretariado',
            'type_id' => 'tipo de curso',
            'number' => 'número do curso',
            'starts_at' => 'começa em',
            'ends_at' => 'termina em',
            'information' => 'informação',
        ];
    }
}
