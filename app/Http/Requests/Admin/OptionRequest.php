<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
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
            'title' => ['required', 'string',],
            'group' => ['required', 'string', 'max:3'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'group' => 'grupo',
        ];
    }
}
