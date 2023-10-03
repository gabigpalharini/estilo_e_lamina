<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function storeAgenda(AgendaFormRequest $request)
    {

        $agenda = Agenda::create([

            'id' => $request->id,
            'profissional_id' => $request->profissional_id,
            'cliente_id' => $request->cliente_id,
            'servico_id' => $request->servico_id,
            'data_hora' => $request->data_hora,
            'tipo_pagamento' => $request->tipo_pagamento,
            'valor' => $request->valor,

        ]);
        return response()->json([
            "success" => true,
            "message" => "Cliente Cadastrado com sucesso",
            "data" => $agenda

        ], 200);
    }

    public function retornarAgenda()
    {
        $agenda = Agenda::all();
        return response()->json([
            ' status' => true,
            'data' => $agenda
        ]);
    }
    public function pesquisarPorAgenda(Request $request)
    {
        $agenda = Agenda::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($agenda) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $agenda
            ]);
        }
    }


    public function excluirAgenda($id)
    {
        $agenda = Agenda::find($id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Agenda não encontrada"
            ]);
        }
    }

    public function updateAgenda(Request $request)
    {
        $agenda = Agenda::find($request->id);
        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Agenda não encontrada"
            ]);
        }

        if (isset($request->id)) {
            $agenda->id = $request->id;
        }
        if (isset($request->profissional_id)) {
            $agenda-> profissional_id = $request->id;
        }
        if (isset($request->cliente_id)) {
            $agenda->cliente_id = $request->id;
        }
        if (isset($request->servico_id)) {
            $agenda->servico_id = $request->id;
        }
        if (isset($request->data_hora)) {
            $agenda->data_hora = $request->id;
        }
        if (isset($request->tipo_pagamento)) {
            $agenda->tipo_pagamento = $request->id;
        }
        if (isset($request->valor)) {
            $agenda->valor = $request->id;
        }



$agenda->updateAgenda();

        return response()->json([
            'status' => true,
            'message' => 'Agenda atualizada.'
        ]);
    }
}