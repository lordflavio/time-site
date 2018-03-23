<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsRequest extends FormRequest
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
            'title' => 'required|min:3',
            'img' => 'required',
            'price' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'title.required' => 'O campo "title" de items é de preenchimento obrigatorio!',
            'title.min' => 'O campo "title" de items deve ter no minimo 3 caracteres!',
            'price.required' => 'O campo "Preço" de items é de preenchimento obrigatorio!',
            'img.required' => 'Caregar uma Imagem é obrigatorio'
        ];
    }
}
