<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterFormRequest extends FormRequest
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
            'email'  => 'required|email',
            'spam_not' => 'max:0',
            'cod_input' => 'required|same:cod_gen|size:4'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Rog completati adresa de email!',
            'spam_not.max' => 'Eroare!',
            'cod_input.required' => 'Rog completati codul anti-spam!',
            'cod_input.same' => 'Codul anti-spam nu este corect!',
            'cod_input.size' => 'Codul anti-spam nu este corect!'
        ];
    }
}
