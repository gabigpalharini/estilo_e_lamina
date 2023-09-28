<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function storeProfissional(ProfissionalFormRequest $request)
    {

        $profissional = Profissional::create([

            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'password' => Hash::make($request->password),
            'salario' => $request->salario

        ]);
        return response()->json([
            "success" => true,
            "message" => "Profissional Cadastrado com sucesso",
            "data" => $profissional,

        ], 200);
    }
    public function retornarProfissional()
    {
        $profissional = Profissional::all();
        return response()->json([
            'status' => true,
            'data' => $profissional
        ]);
    }
    public function pesquisarPorProfissional(Request $request)
    {
        $profissional = profissional::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($profissional) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $profissional
            ]);
        }
    }
    public function excluirProfissional($id)
    {
        $profissional = Profissional::find($id);

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }
    }
    public function updateProfissional(Request $request)
    {
        $profissional = Profissional::find($request->id);
        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }

        if (isset($request->id)) {
            $profissional->id = $request->id;
        }

        if (isset($request->nome)) {
            $profissional->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $profissional->celular = $request->celular;
        }
        if (isset($request->email)) {
            $profissional->email = $request->email;
        }
        if (isset($request->cpf)) {
            $profissional->cpf = $request->cpf;
        }
        if (isset($request->dataNascimento)) {
            $profissional->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cidade)) {
            $profissional->cidade = $request->cidade;
        }

        if (isset($request->estado)) {
            $profissional->estado = $request->estado;
        }

        if (isset($request->pais)) {
            $profissional->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $profissional->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $profissional->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $profissional->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $profissional->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $profissional->complemento = $request->complemento;
        }
        if (isset($request->senha)) {
            $profissional->senha = $request->senha;
        }
        if (isset($request->salario)) {
            $profissional->salario = $request->salario;
        }


        $profissional->updateProfissional();

        return response()->json([
            'status' => true,
            'message' => 'Profissional atualizado.'
        ]);
    }
}
