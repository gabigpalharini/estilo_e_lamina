<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function storeProfissional(ProfissionalFormRequest $request)
    {

        $Profissional = Profissional::create([

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
            "data" => $Profissional

        ], 200);
}
public function retornarProfissional()
{
    $Profissional = Profissional::all();
    return response()->json([
        ' status' => true,
        'data' => $Profissional
    ]);
}
public function pesquisarPorProfissional(Request $request)
    {
        $Profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($Profissional) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $Profissional
            ]);
        }
    }
    public function excluirProfissional($id)
    {
        $Profissional = Profissional::find($id);

        if (!isset($Profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }
    }
    public function updateProfissional(Request $request)
    {
        $Profissional = Profissional::find($request->id);
        if (!isset($Profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }

        if (isset($request->id)) {
            $Profissional->id = $request->id;
        }

        if (isset($request->nome)) {
            $Profissional->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $Profissional->celular = $request->celular;
        }
        if (isset($request->email)) {
            $Profissional->email = $request->email;
        }
        if (isset($request->cpf)) {
            $Profissional->cpf = $request->cpf;
        }
        if (isset($request->dataNascimento)) {
            $Profissional->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cidade)) {
            $Profissional->cidade = $request->cidade;
        }

        if (isset($request->estado)) {
            $Profissional->estado = $request->estado;
        }

        if (isset($request->pais)) {
            $Profissional->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $Profissional->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $Profissional->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $Profissional->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $Profissional->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $Profissional->complemento = $request->complemento;
        }
        if (isset($request->senha)) {
            $Profissional->senha = $request->senha;
        }
        if (isset($request->salario)) {
            $Profissional->salario = $request->salario;
        }

        
        $Profissional->updateProfissional();

        return response()->json([
            'status' => true,
            'message' => 'Profissional atualizado.'
        ]);
    }
}
