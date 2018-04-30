<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'last_name' => 'required|min:2',
            'first_name' => 'required|min:2',
            'email'  => 'required|email',
            'phone'  => 'required|min:10',
            'message' => 'required|min:3',
            'spam_not' => 'max:0',
            'cod_input' => 'required|same:cod_gen|size:4'
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => 'Rog completati numele!',
            'first_name.required' => 'Rog completati prenumele!',
            'email.required' => 'Rog completati adresa de email!',
            'phone.required' => 'Rog completati numarul de telefon!',
            'message.required' => 'Rog completati mesajul!',
            'last_name.min' => 'Numele trebuie sa aiba cel putin 2 caractere!',
            'first_name.min' => 'Prenumele trebuie sa aiba cel putin 2 caractere!',
            'phone.min' => 'Numarul de telefon este gresit!',
            'message.min' => 'Mesajul este prea scurt!',
            'spam_not.max' => 'Eroare!',
            'cod_input.required' => 'Rog completati codul anti-spam!',
            'cod_input.same' => 'Codul anti-spam nu este corect!',
            'cod_input.size' => 'Codul anti-spam nu este corect!'
        ];
    }
}
