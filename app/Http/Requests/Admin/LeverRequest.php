<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LeverRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'course_id' => ['required', 'string', 'min:30'],
            'person_id' => ['nullable', 'string', 'min:30'],
            'sender' => ['required', 'email'],
            'information' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'course_id' => 'identificador do curso',
            'person_id' => 'identificador do cursista',
            'sender' => 'remetente',
            'information' => 'mensagem',
        ];
    }
}
