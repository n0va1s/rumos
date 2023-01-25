<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'birth_at' => ['required', 'date', 'before:18 years ago'],
            'gender_id' => ['required', 'numeric'],
            'email' => ['required', 'e-mail', 'min:5'],
            'phone' => ['required', 'numeric', 'min:11'],
            'social' => ['nullable', 'url'],
            'uf_id' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string'],
            'number' => ['nullable', 'numeric'],
            'city' => ['nullable', 'string', 'min:5'],
            'zipcode' => ['nullable', 'string', 'min:8'],
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'nome',
            'last_name' => 'sobrenome',
            'birth_at' => 'data de nascimento',
            'gender_id' => 'gênero',
            'email' => 'email',
            'phone' => 'celular',
            'social' => 'rede social',
            'uf_id' => 'UF',
            'description' => 'logradouro',
            'number' => 'número',
            'city' => 'cidade',
            'zipcode' => 'cep',
        ];
    }
}
