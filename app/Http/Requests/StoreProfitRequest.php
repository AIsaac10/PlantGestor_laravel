<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description_profit' => 'required|string|max:255',
            'quantity_profit' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'description_profit.required' => 'A descrição do lucro é obrigatória.',
            'description_profit.string' => 'A descrição deve ser um texto válido.',
            'description_profit.max' => 'A descrição pode ter no máximo 255 caracteres.',

            'quantity_profit.required' => 'O valor do lucro é obrigatório.',
            'quantity_profit.numeric' => 'O valor do lucro deve ser numérico.',
            'quantity_profit.min' => 'O lucro não pode ser negativo.',
        ];
    }
}
