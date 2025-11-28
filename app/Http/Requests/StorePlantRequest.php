<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'culture' => 'required|string|unique:plants,culture|max:255',
        ];
    }

    public function messages()
    {
        return [
            'culture.required' => 'O nome da cultura é obrigatório.',
            'culture.unique' => 'Essa planta já está cadastrada.',
            'culture.string' => 'A cultura deve ser um texto válido.',
        ];
    }
}
