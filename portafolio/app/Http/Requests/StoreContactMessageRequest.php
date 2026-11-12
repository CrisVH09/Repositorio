<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * The "website" field is a honeypot: it is hidden from humans, so any
     * value means the form was submitted by a bot.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'website' => ['prohibited'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, escribe tu nombre.',
            'name.max' => 'El nombre no puede superar los :max caracteres.',
            'email.required' => 'Necesito tu correo para poder responderte.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'subject.max' => 'El asunto no puede superar los :max caracteres.',
            'message.required' => 'Escribe tu mensaje.',
            'message.min' => 'El mensaje debe tener al menos :min caracteres.',
            'message.max' => 'El mensaje no puede superar los :max caracteres.',
            'website.prohibited' => 'No se pudo enviar el mensaje.',
        ];
    }
}
