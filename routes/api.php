<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('store', [ServicoController::class, 'store']);

Route::get('find/{id}',
[ServicoController::class, 'pesquisarPorId']);

Route::get('find/cpf/{cpf}', [ServicoController::class, 'pesquisarPorCpf']);
Route::get('all', [ServicoController::class, 'retornarTodos']);

Route::post('nome', [ServicoController::class, 'pesquisarPorNome']);

Route::delete('delete/{id}', [ServicoController::class, 'excluir']);

Route::put('update', [ServicoController::class, 'update']);







Route::post('store', [ServicoController::class, 'store']);

Route::get(
    'find/{id}',
    [ServicoController::class, 'pesquisarPorId']
);

Route::get('find/cpf/{cpf}', [ServicoController::class, 'pesquisarPorCpf']);
Route::get('all', [ServicoController::class, 'retornarTodos']);

Route::post('nome', [ServicoController::class, 'pesquisarPorNome']);


Route::delete('delete/{id}', [ServicoController::class, 'excluir']);

Route::put('update', [ServicoController::class, 'update']);

//------------------------------------------------------------------------------CLIENTES--------------------------------------------------------------------------------//

Route::post('store/Cliente', [ClienteController::class, 'storeCliente']); //Cadastrar

Route::get('all/Cliente', [ClienteController::class, 'retornarTodosClientes']); //vizualizar

Route::post('nome/Cliente', [ClienteController::class, 'pesquisarClientePorNome']);
Route::post('cpf/Cliente/{cpf}', [ClienteController::class, 'pesquisarClientePorCpf']);
Route::post('celular/Cliente', [ClienteController::class, 'pesquisarClientePorCelular']);
Route::post('email/Cliente', [ClienteController::class, 'pesquisarClientePorEmail']);


Route::put('update/Cliente', [ClienteController::class, 'updateCliente']); //atualizar e editar

Route::delete('delete/Cliente/{id}', [ClienteController::class, 'excluirCliente']); //excluir



//------------------------------------------------------------------------------PROFISSIONAL--------------------------------------------------------------------------------//

Route::post('store/Profissional', [ProfissionalController::class, 'storeProfissional']); //Cadastrar

Route::get('all/Profissional', [ProfissionalController::class, 'retornarTodosProfissionais']); //vizualizar

Route::post('nome/Profissional', [ProfissionalController::class, 'pesquisarPorNomeProfissional']);
Route::post('cpf/Profissional/{cpf}', [ProfissionalController::class, 'pesquisarPorCpfProfissional']);
Route::post('celular/Profissional', [ProfissionalController::class, 'pesquisarProfissionalPorCelular']);
Route::post('email/Profissional', [ProfissionalController::class, 'pesquisarProfissionalPorEmail']);


Route::put('update/Profissional', [ProfissionalController::class, 'updateProfissional']); //atualizar e editar

Route::delete('delete/Profissional/{id}', [ProfissionalController::class, 'excluirProfissional']); //excluir

// ----------------------------------------------------------------------------AGENDA--------------------------------------------------------------------------------------------//

Route::post('store/Agenda', [AgendaController::class, 'storeAgenda']); //Cadastrar

Route::get('all/Agenda', [AgendaController::class, 'retornarAgenda']); //vizualizar
Route::get('find/{id}', [AgendaController::class, 'pesquisarAgenda']);
Route::delete('delete/{id}', [AgendaController::class, 'excluirAgenda']);

Route::put('update', [AgendaController::class, 'updateAgenda']);