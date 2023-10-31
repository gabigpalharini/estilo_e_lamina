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


            'profissional' => $request->profissional,
            'cliente'=>$request->cliente,
            'servico'=>$request->servico,
            'data_hora' => $request->data_hora,
            'pagamento' => $request->pagamento,
            'valor' => $request->valor



        ]);
        return response()->json([
            "success" => true,
            "message" => "Agenda Cadastrada com sucesso",
            "data" => $agenda

        ], 200);
    }


    public function pesquisarPorData(Request $request)
    {


        $agenda = Agenda::where('data_hora', '>=', $request->data_hora)->get();


        if (count($agenda) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $agenda
            ]);
        }
    }



    public function pesquisarAgendaPorNome(Request $request)
    {
        $agenda = Agenda::where('profissional', 'like', '%' . $request->profissional . '%')->get();

        if (count($agenda) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $agenda
            ]);
        }




        return response()->json([
            'status' => false,
            'data' => 'Profissional não disponivel'
        ]);
    }







    public function retornarTodosClientes()
    {
        $agenda = Agenda::all();
        return response()->json([
            ' status' => true,
            'data' => $agenda
        ]);
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

        $agenda->delete();
        return response()->json([
            'status' => true,
            'message' => "Agenda excluido com sucessa"
        ]);
    }

    public function updateAgenda(AgendaFormRequest $request)
    {
        $agenda = Agenda::find($request->id);
        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não Sencontrado"
            ]);
        }

        if (isset($request->profissional)) {
            $agenda->profissional = $request->profissional;
        }

        if (isset($request->cliente)) {
            $agenda->cliente = $request->cliente;
        }
        if (isset($request->data_hora)) {
            $agenda->data_hora = $request->data_hora;
        }
        if (isset($request->pagamento)) {
            $agenda->pagamento = $request->pagamento;
        }
        if (isset($request->valor)) {
            $agenda->valor = $request->valor;
        }





        $agenda->update();

        return response()->json([
            'status' => true,
            'message' => 'Agenda atualizada.'
        ]);
    }
}
