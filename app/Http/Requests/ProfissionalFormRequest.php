<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalFormRequest extends FormRequest
{
  
    public function rules(): array
    {
        return [
                'nome'=> 'required|max:120|min:5|',
                'celular' => 'required|max:11|min:10|',
                'email'=>'required|max:120||unique:profissionals,email',
                'cpf' => 'required|max:11|min:11|unique:profissionals,cpf',
                'dataNascimento' => 'required',
                'cidade'=> 'required|max:120|',
                'estado' => 'required|max:2|min:2|',
                'pais' => 'required|max:80|',
                'rua' => 'required|max:120|min:5|',
                'numero' => 'required|max:10|',
                'bairro' => 'required|max:100|',
                'cep'=> 'required|max:8|',
                'complemento' => 'max:150',
                'password' =>  'required',
                'salario' => 'required',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){
        return[
    'nome.required' => 'O campo nome é obrigatorio',
    'nome.max' => 'o campo nome deve conter no maximo 120 caracteres',
    'nome.min' => 'o campo nome deve conter no minimo 5 caracteres',
    'celular.required' => 'descrição obrigatorio',
    'celular.max' => 'descrição deve conter no máximo 11 caracteres',
    'celular.min' => 'descrição deve conter no minimo 10 caracteres',
    'email.required' => 'O campo email é obrigatorio',
    'email.max' => 'o campo nome deve conter no maximo 120 caracteres',
    'email.unique' => 'o campo email é unique',
    'email.email' => 'este campo só aceita email',
    'cpf.required' => 'cpf obrigatório',
    'cpf.max' => 'o campo cpf deve conter no maximo 11 caracteres',
    'cpf.min' => 'o campo cpf deve conter no minimo 11 caracteres',
    'cpf.unique' => 'o campo cpf é unique',
    'dataNascimento.required' => 'O campo dataNascimento é obrigatorio',
    'cidade.required' => 'O campo cidade é obrigatorio',
    'cidade.max' => 'o campo cidade deve conter no maximo 120 caracteres',
    'estado.required' => 'O campo estado é obrigatorio',
    'estado.max' => 'o campo estado deve conter no maximo 2 caracteres',
    'estado.min' => 'o campo estado deve conter no minimo 2 caracteres',
    'pais.required' => 'O campo pais é obrigatorio',
    'pais.max' => 'o campo pais deve conter no maximo 80 caracteres',
    'rua.required' => 'O campo rua é obrigatorio',
    'rua.max' => 'o campo rua deve conter no maximo 120 caracteres',
    'rua.min' => 'o campo rua deve conter no minimo 5 caracteres',
    'numero.required' => 'O campo numero é obrigatorio',
    'numero.max' => 'o campo nome deve conter no maximo 10 caracteres',
    'bairro.required' => 'O campo nome é obrigatorio',
    'bairro.max' => 'o campo nome deve conter no maximo 100 caracteres',
    'cep.required' => 'O campo cep é obrigatorio',
    'cep.max' => 'o campo cep deve conter no maximo 8 caracteres',
    'complemento.max' => 'o campo complemento deve conter no maximo 150 caracteres',
    'password.required' => 'O campo senha é obrigatorio',
    'salario.required' => 'O campo salario é obrigatorio',
    'salario.decimal' => 'este campo só aceita numeros em decimal'
        ];
    }
}
