<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BakingRequest extends FormRequest
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
            'img' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'name.required' => 'O campo "Nome" de apoio é de preenchimento obrigatorio!',
            'img.required' => 'Caregar uma Imagem é obrigatorio'
        ];
    }
}
