<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'date' => 'required',
            'author' => 'required|min:3',
            'matter' => 'required||max:500'
        ];
    }
    
    public function messages(){
        return [
            'title.required' => 'O campo "title" de noticias é de preenchimento obrigatorio!',
            'title.min' => 'O campo "title" de noticias deve ter no minimo 3 caracteres!',
            'author.min' => 'O campo "Autor" de noticias deve ter no minimo 3 caracteres',
            'matter.max' => 'O campo "Conteudo" de noticias deve ter no máximo 500 caracteres',
            'img.required' => 'Caregar uma Imagem é obrigatorio'
        ];
    }
}
