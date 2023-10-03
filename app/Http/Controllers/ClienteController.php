<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function storeCliente(ClienteFormRequest $request)
    {

        $cliente = Cliente::create([

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
            'password' => Hash::make($request->password)

        ]);
        return response()->json([
            "success" => true,
            "message" => "Cliente Cadastrado com sucesso",
            "data" => $cliente

        ], 200);
    }

    public function retornarCliente()
    {
        $cliente = Cliente::all();
        return response()->json([
            ' status' => true,
            'data' => $cliente
        ]);
    }

    public function pesquisarPorCliente(Request $request)
    {
        $cliente = Cliente::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($cliente) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $cliente
            ]);
        }
    }

    public function excluirCliente($id)
    {
        $cliente = Cliente::find($id);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não encontrado"
            ]);
        }
    }




    
    public function updateCliente(Request $request)
    {
        $cliente = Cliente::find($request->id);
        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não encontrado"
            ]);
        }

        if (isset($request->id)) {
            $cliente->id = $request->id;
        }

        if (isset($request->nome)) {
            $cliente->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $cliente->celular = $request->celular;
        }
        if (isset($request->email)) {
            $cliente->email = $request->email;
        }
        if (isset($request->cpf)) {
            $cliente->cpf = $request->cpf;
        }
        if (isset($request->dataNascimento)) {
            $cliente->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cidade)) {
            $cliente->cidade = $request->cidade;
        }

        if (isset($request->estado)) {
            $cliente->estado = $request->estado;
        }

        if (isset($request->pais)) {
            $cliente->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $cliente->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $cliente->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $cliente->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $cliente->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $cliente->complemento = $request->complemento;
        }
        if (isset($request->senha)) {
            $cliente->senha = $request->senha;
        }


        


        $cliente->updateCliente();

        return response()->json([
            'status' => true,
            'message' => 'Cliente atualizado.'
        ]);
    }
}
