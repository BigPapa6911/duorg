<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        return Perfil::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'descricao' => 'required|string|unique:perfis,descricao',
        ]);

        return Perfil::create($data);
    }

    public function show($id)
    {
        return Perfil::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $perfil = Perfil::findOrFail($id);

        $data = $request->validate([
            'descricao' => 'required|string|unique:perfis,descricao,' . $id,
        ]);

        $perfil->update($data);
        return $perfil;
    }

    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();
        return response(null, 204);
    }
}