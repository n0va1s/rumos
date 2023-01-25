<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'person_id' => ['required', 'string', 'min:30'],
            'presenter_id' => ['nullable', 'string', 'min:30'],
            'reason' => ['required', 'string'],
            'other_information' => ['nullable', 'string'],
            'has_agreement' => ['required', 'accepted'],
            'has_acceptance' => ['required', 'accepted'],
            'has_first_communion'=> ['nullable', 'string'],
            'has_chrism'=> ['nullable', 'string'],
            'is_approved'=> ['nullable', 'boolean'],
        ];
    }

    public function attributes()
    {
        return [
            'person_id' => 'identificador do cursista',
            'presenter_id' => 'identificador do apresentante',
            'reason' => 'motivo',
            'other_information' => 'outra informação',
            'has_agreement' => 'concordo com a metodologia',
            'has_acceptance' => 'aceito que meus dados sejam armazenados',
            'has_first_communion'=> 'fez primeira comunhão',
            'has_chrism'=> 'fez crisma',
            'is_approved'=> 'está aprovada',
        ];
    }
}
