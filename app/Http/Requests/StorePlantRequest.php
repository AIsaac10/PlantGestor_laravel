<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePlantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'culture' => [
                'required',
                'string',
                'max:255',
                Rule::unique('plants')->where(fn($query) => $query->where('user_id', auth()->id())),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'culture.required' => 'O nome da planta é obrigatório.',
            'culture.string' => 'A planta deve ser um texto válido.',
            'culture.max' => 'A planta deve ter no máximo 255 caracteres.',
            'culture.unique' => 'Você já cadastrou essa planta.',
        ];
    }
}

