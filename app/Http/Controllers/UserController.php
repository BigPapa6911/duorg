<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Lista todos os usuários
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Exibe um usuário específico
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        return response()->json($user);
    }


    // Cria um novo usuário
    public function store(Request $request)
    {
        // Valida os dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|unique:users,phone_number',
            'password' => 'required|string|min:8|confirmed',
            'type' => ['required', Rule::in(['RECEIVER', 'DONOR', 'ADMIN'])],
            'gender' => ['required', Rule::in(['MALE', 'FEMALE'])],
            'cpf' => 'required|string|unique:users,cpf',
            'rg' => 'required|string|unique:users,rg',
            'zip_code' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
        ]);

        // Cria o novo usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password), // Criptografa a senha
            'type' => $request->type,
            'gender' => $request->gender,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'zip_code' => $request->zip_code,
            'state' => $request->state,
            'city' => $request->city,
            'district' => $request->district,
            'address' => $request->address,
        ]);

        return response()->json($user, 201);
    }

    // Atualiza os dados de um usuário
    public function update(Request $request, $id)
    {
        // Valida os dados
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $id,
            'phone_number' => 'string|unique:users,phone_number,' . $id,
            'password' => 'string|min:8|confirmed',
            'type' => [Rule::in(['RECEIVER', 'DONOR', 'ADMIN'])],
            'gender' => [Rule::in(['MALE', 'FEMALE'])],
            'cpf' => 'string|unique:users,cpf,' . $id,
            'rg' => 'string|unique:users,rg,' . $id,
            'zip_code' => 'string',
            'state' => 'string',
            'city' => 'string',
            'district' => 'string',
            'address' => 'string',
        ]);

        // Encontrar o usuário
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        // Atualiza os campos do usuário
        $user->update($request->only([
            'name',
            'email',
            'phone_number',
            'password',
            'type',
            'gender',
            'cpf',
            'rg',
            'zip_code',
            'state',
            'city',
            'district',
            'address',
        ]));

        // Se a senha foi alterada, criptografá-la
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return response()->json($user);
    }

    // Deleta um usuário
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        // Deleta o usuário
        $user->delete();

        return response()->json(['message' => 'Usuário deletado com sucesso']);
    }
}
