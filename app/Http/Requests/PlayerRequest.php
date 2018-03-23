<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'name' => 'required|min:3',
            'position' => 'required',
            'number' => 'required|numeric',
            'img' => 'required'
        ];
    }
    
    public function messages(){
        return [
            'name.required' => 'O campo "Nome" é de preenchimento obrigatorio!',
            'name.min' => 'O campo "Nome" deve ter no minimo 3 caracteres',
            'position' => 'O campo "Posição" é de preenchimento obrigatorio',
            'number.required' => 'O campo "Número" é de preenchimento obrigatorio',
            'number.numeric' => 'O campo "NºCamisa" precisa apenas de números',
            'img.required' => 'Caregar uma Imagem é obrigatorio'
        ];
    }
}
