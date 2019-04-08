<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'old_pass' => 'required',
            'new_pass' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'old_pass.required' => 'Va rugam sa introduceti parola actuala!',
            'new_pass.required'  => 'Va rugam sa introduceti parola noua!',
            'new_pass.string'  => 'Noua parola trebuie sa fie un sir de catactere!',
            'new_pass.min'  => 'Noua parola trebuie sa fie din minim 6 caractere!',
            'new_pass.confirmed'  => 'Parola noua nu este confirmata corect!',
        ];
    }
}
