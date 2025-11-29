<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFertilizerRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Permite que apenas usuários autenticados possam criar fertilizantes
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'plant_id' => 'required|integer|exists:plants,id',
            'fertilizer' => 'required|string|max:255',
            'time_fertilizer' => 'required|date',
            'weight_fertilizer' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'plant_id.required' => 'A planta é obrigatória.',
            'plant_id.exists' => 'A planta selecionada não existe.',
            'fertilizer.required' => 'O nome do fertilizante é obrigatório.',
            'fertilizer.string' => 'O nome do fertilizante deve ser um texto.',
            'fertilizer.max' => 'O nome do fertilizante deve ter no máximo 255 caracteres.',
            'time_fertilizer.required' => 'A data do fertilizante é obrigatória.',
            'time_fertilizer.date' => 'A data do fertilizante deve ser válida.',
            'weight_fertilizer.required' => 'O peso do fertilizante é obrigatório.',
            'weight_fertilizer.numeric' => 'O peso do fertilizante deve ser um número.',
        ];
    }
}
