<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'community_id' => ['required', 'numeric',],
            'frequency_id' => ['required', 'numeric',],
            'information' => ['required', 'string', 'min:10',],
        ];
    }

    public function attributes()
    {
        return [
            'community_id' => 'secretariado',
            'frequency_id' => 'frequência',
            'information' => 'informações',
        ];
    }
}
