<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5',
            'celular' => 'required|max:11|min:10|',
            'email'  => 'required|max:120|unique:clientes,email',
            'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
            'dataNascimento' => 'required',
            'cidade' => 'required|max:120|',
            'estado' => 'required|max:2|min:2',
            'pais' => 'required|max:80',
            'rua' => 'required|max:120',
            'numero' => 'required|max:10',
            'bairro' => 'required|max:100',
            'cep' => 'required|max:8',
            'complemento' => 'max:150',
            'password' => 'required'
    
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }


    public function messages()
    {
        return  [
            
            'nome.max' => 'Este campo deve conter no maximo 120 caractéris',
            'nome.min' => 'Este campo deve conter no minimo 5 caractéris',
            


            'celular.max' => 'Este campo deve conter no maximo 11 caractéris',
            'celular.min' => 'Este campo deve conter no minimo 10 caractéris',

          
            'email.email' => 'formato inválido',
            'email.unique' => 'email já cadastrado no sistema',

            
            'cpf.max' => 'o campo deve conter 11 caracteris',
            'cpf.min' => 'o campo deve no minimo 11 caracteris',
            'cpf.unique' => 'esse cpf já foi cadastrado no sistema',

            
            'dataNascimento.date'=>'coloque sua data corretamente',

           
            'cidade.max' => 'Este campo deve conter no maximo 120 caractéris',
            

            
            'estado.max' => 'Este campo deve conter no maximo 2 caractéris',
            'estado.min' => 'Este campo deve conter no minimo 2 caractéris',
            

           
            'pais.max' => 'Este campo deve conter no maximo 80 caractéris',
            

           
            'rua.max' => 'Este campo deve conter no maximo 120 caractéris',
            

            'numero.required' => 'Preencha o campo numero',
            'numero.max' => 'Este campo deve conter no maximo 10 caractéris',

            
            'bairro.max' => 'Este campo deve conter no maximo 100 caractéris',
            'bairro.string' => 'Este campo só aceita letras',

         
            'cep.max' => 'Este campo deve conter no maximo 8 caractéris',
            'cep.min' => 'o campo deve no minimo 8 caracteris',
            'cep.numeric' => 'Este campo só aceita numeros',

            'complemento.max' => 'Este campo deve conter no maximo 150 caractéris',

            
        ];


}
}
