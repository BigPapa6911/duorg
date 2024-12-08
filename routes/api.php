<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api/users')->group(function() {
    Route::get('/', [UserController::class, 'index']);              // Lista de usuários
    Route::get('{id}', [UserController::class, 'show']);            // Detalhes de um usuário
    Route::post('/', [UserController::class, 'store']);             // Criar um novo usuário
    Route::put('{id}', [UserController::class, 'update']);          // Atualizar um usuário
    Route::delete('{id}', [UserController::class, 'destroy']);      // Deletar um usuário
});

