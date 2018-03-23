<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GamesRequest extends FormRequest
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
            'date' => 'required',
            'time' => 'required',
            'address' => 'required|max:120',
            'description' => 'required|max:200',
            'club1' => 'required',
            'club2' => 'required'
        ];
    }
    
    public function messages(){
        return [
            'name.required' => 'O campo "Data" é de preenchimento obrigatorio!',
            'name.required' => 'O campo "Hora" é de preenchimento obrigatorio!',
            'club1.required' => 'O campo "Time 1" deve-se selecionar um clube!',
            'club2.required' => 'O campo "Time 2" deve-se selecionar um clube!',
            'address.required' => 'O campo "Endereço" é de preenchimento obrigatorio',
            'description.max' => 'O campo "Descrição" deve ter no Maximo 200 caracteres',
            'address.max' => 'O campo "Endereço" deve ter no Maximo 120 caracteres',
        ];
    }
}
