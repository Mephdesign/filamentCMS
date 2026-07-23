<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:5000'],
            // honeypot - pole ukryte w formularzu, ma zostać puste
            'website' => ['prohibited'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Proszę podać imię i nazwisko.',
            'email.required'   => 'Proszę podać adres e-mail.',
            'email.email'      => 'Podany adres e-mail jest nieprawidłowy.',
            'message.required' => 'Proszę wpisać treść wiadomości.',
        ];
    }
}
