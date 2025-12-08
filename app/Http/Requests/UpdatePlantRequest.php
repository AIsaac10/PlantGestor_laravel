<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $plantId = $this->route('plant')->id;

        return [
            'culture' => 'required|string|max:255|unique:plants,culture,' . $plantId . ',id,user_id,' . auth()->id(),
            'description' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'culture.required' => 'O nome da planta é obrigatório.',
            'culture.string' => 'A planta deve ser um texto válido.',
            'culture.max' => 'A planta deve ter no máximo 255 caracteres.',
            'culture.unique' => 'Essa planta já está cadastrada.',
        ];
    }
}