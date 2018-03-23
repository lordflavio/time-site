<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubsRequest extends FormRequest
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
            'shild' => 'required',
            'description' => 'required|max:500'
        ];
    }
    
    public function messages(){
        return [
            'name.required' => 'O campo "Nome" é de preenchimento obrigatorio!',
            'name.min' => 'O campo "Nome" deve ter no minimo 3 caracteres',
            'shild.required' => 'Caregar uma Imagem é obrigatorio'
        ];
    }
}
