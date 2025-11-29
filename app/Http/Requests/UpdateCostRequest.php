<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'description_cost' => 'required|string|max:255',
            'quantity_cost'    => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'description_cost.required' => 'A descrição do custo é obrigatória.',
            'description_cost.string'   => 'A descrição deve ser um texto válido.',
            'description_cost.max'      => 'A descrição deve ter no máximo 255 caracteres.',

            'quantity_cost.required'    => 'O valor do custo é obrigatório.',
            'quantity_cost.numeric'     => 'O valor do custo deve ser um número válido.',
            'quantity_cost.min'         => 'O valor do custo não pode ser negativo.',
        ];
    }
}
