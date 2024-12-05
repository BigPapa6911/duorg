<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\OrgaoController;
use App\Http\Controllers\RelacaoUsuarioOrgaoController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\HospitalUsuarioController;

Route::prefix('v1')->group(function () {
    // Rotas de Usuários
    Route::apiResource('usuarios', UsuarioController::class);

    // Rotas de Perfis
    Route::apiResource('perfis', PerfilController::class);

    // Rotas de Endereços
    Route::apiResource('enderecos', EnderecoController::class);

    // Rotas de Órgãos
    Route::apiResource('orgaos', OrgaoController::class);

    // Rotas de Relações Usuário-Órgão
    Route::apiResource('relacao-usuarios-orgaos', RelacaoUsuarioOrgaoController::class);

    // Rotas de Hospitais
    Route::apiResource('hospitais', HospitalController::class);

    // Rotas de Relações Hospital-Usuário
    Route::apiResource('hospital-usuarios', HospitalUsuarioController::class);
});