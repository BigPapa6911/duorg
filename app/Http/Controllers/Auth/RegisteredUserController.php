<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;


class RegisteredUserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'type' => 'required|in:RECEPTOR,DOADOR',
            'birth_date' => 'required|date',
            'cpf' => 'required|string|size:11|unique:users,cpf',
            'rg' => 'nullable|string',
            'gender' => 'nullable|in:MASC,FEM',
            'profile_id' => 'required|exists:profiles,id',
            'blood_type' => 'required|string|max:3',
            'rh_factor' => 'required|string|in:+,-',
        ]);

        // Criação do usuário usando o UserService
        $user = $this->userService->createUser($validated);

        // Retorno da resposta
        return response()->json(['message' => 'Usuário registrado com sucesso!', 'user' => $user], 201);
    }

    public function list(Request $request)
    {
        return response()->json($this->userService->filterUsers($request));
    }
}