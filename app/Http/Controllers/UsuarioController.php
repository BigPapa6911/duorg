<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::with(['endereco', 'perfil'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
            'id_endereco' => 'nullable|exists:enderecos,id',
            'id_perfil' => 'required|exists:perfis,id',
        ]);

        $data['senha'] = bcrypt($data['senha']);
        return Usuario::create($data);
    }

    public function show($id)
    {
        return Usuario::with(['endereco', 'perfil'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $data = $request->validate([
            'nome' => 'sometimes|string',
            'email' => 'sometimes|email|unique:usuarios,email,' . $id,
            'senha' => 'nullable|string|min:6',
            'id_endereco' => 'nullable|exists:enderecos,id',
            'id_perfil' => 'sometimes|exists:perfis,id',
        ]);

        if (isset($data['senha'])) {
            $data['senha'] = bcrypt($data['senha']);
        }

        $usuario->update($data);
        return $usuario;
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response(null, 204);
    }
}