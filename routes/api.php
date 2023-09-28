<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Serviço

Route::post('service', [ServicoController::class, 'servico']);

Route::get('service/find/{id}', [ServicoController::class, 'servicoId']);

Route::post('service/name', [ServicoController::class, 'servicoNome']);

Route::post('service/description', [ServicoController::class, 'servicoDescricao']);

Route::get('service/all', [ServicoController::class, 'servicoRetornar']);

Route::delete('service/delete/{id}', [ServicoController::class, 'servicoExcluir']);

Route::put('service/update', [ServicoController::class, 'servicoUpdate']);




//Cliente


Route::post('client', [ClienteController::class, 'cliente']);

Route::get('client/find/{id}', [ClienteController::class, 'clienteId']);

Route::post('client/name', [ClienteController::class, 'clienteNome']);

Route::post('client/cpf', [ClienteController::class, 'clienteCpf']);

Route::post('client/cellphone', [ClienteController::class, 'clienteCelular']);

Route::post('client/email', [ClienteController::class, 'clienteEmail']);

Route::get('client/all', [ClienteController::class, 'clienteRetornar']);

Route::delete('client/delete/{id}', [ClienteController::class, 'clienteExcluir']);

Route::put('client/update', [ClienteController::class, 'clienteUpdate']);

//Profissionais

Route::post('professional', [ProfisssionalController::class, 'profissional']);

Route::get('professional/find/{id}', [ProfisssionalController::class, 'profissionalId']);

Route::post('professional/name', [ProfisssionalController::class, 'profissionalNome']);

Route::post('professional/cpf', [ProfisssionalController::class, 'profissionalCpf']);

Route::post('professional/cellphone', [ProfisssionalController::class, 'profissionalCelular']);

Route::post('professional/email', [ProfisssionalController::class, 'profissionalEmail']);

Route::get('professional/all', [ProfisssionalController::class, 'profissionalRetornar']);

Route::delete('professional/delete/{id}', [ProfisssionalController::class, 'profissionalExcluir']);

Route::put('professional/update', [ProfisssionalController::class, 'profissionalUpdate']);
