<?php

use App\Http\Controllers\ClienteController;
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







Route::post('store/Cliente', [ClienteController::class, 'storeCliente']);

Route::get('find/Cliente/{id}',
[ClienteController::class, 'pesquisarPorCliente']);

Route::put('update/Cliente', [ClienteController::class, 'updateCliente']);

Route::get('all/Cliente', [ClienteController::class, 'retornarCliente']);

Route::delete('delete/{id}', [ClienteController::class, 'excluirCliente']);
