<?php

use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Serviço

Route::post('Servico', [ServicoController::class, 'Servico']);

Route::get('find/{id}', [ServicoController::class, 'ServicoID']);

Route::post('/name', [ServicoController::class, 'ServicoNome']);

Route::post('/description', [ServicoController::class, 'ServicoDescricao']);

Route::get('/all', [ServicoController::class, 'ServicoRetornar']);

Route::delete('delete/{id}', [ServicoController::class, 'ServicoExcluir']);

Route::put('update', [ServicoController::class, 'ServicoUpdate']);