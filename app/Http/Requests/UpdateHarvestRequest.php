<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHarvestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'plant_id' => 'required|exists:plants,id',
            'time_harvest' => 'required|date',
            'weight_harvest' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'plant_id.required' => 'Selecione a planta.',
            'plant_id.exists' => 'A planta selecionada não existe.',
            'time_harvest.required' => 'A data da colheita é obrigatória.',
            'time_harvest.date' => 'Informe uma data válida.',
            'weight_harvest.required' => 'O peso da colheita é obrigatório.',
            'weight_harvest.numeric' => 'O peso deve ser um número.',
            'weight_harvest.min' => 'O peso não pode ser negativo.',
        ];
    }
}
