<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' =>  'required',
            'profissional_id' => 'required',
            'cliente_id' => 'required|bigInteger',
            'servico_id' => 'required|bigInteger',
            'data_hora' =>  'required',
            'tipo_pagamento' => 'required|max:20|min:3|',
            'valor' =>  'required',
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
    'id.required' => 'O campo id é obrigatorio',
    'profissional_id.required' => 'O campo profissional_id é obrigatorio',
    'tipo_pagamento.required' => 'O campo tipo_pagamento é obrigatorio',
    'tipo_pagamento.max' => 'o campo tipo_pagamento deve conter no maximo 20 caracteres',
    'tipo_pagamento.min' => 'o campo tipo_pagamento deve conter no minimo 3 caracteres',
    'valor.required' => 'O campo valor é obrigatorio',
        ];
 }
}