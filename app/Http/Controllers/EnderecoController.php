<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        return Endereco::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rua' => 'required|string',
            'numero' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'cep' => 'required|string',
        ]);

        return Endereco::create($data);
    }

    public function show($id)
    {
        return Endereco::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $endereco = Endereco::findOrFail($id);

        $data = $request->validate([
            'rua' => 'sometimes|string',
            'numero' => 'sometimes|string',
            'cidade' => 'sometimes|string',
            'estado' => 'sometimes|string',
            'cep' => 'sometimes|string',
        ]);

        $endereco->update($data);
        return $endereco;
    }

    public function destroy($id)
    {
        $endereco = Endereco::findOrFail($id);
        $endereco->delete();
        return response(null, 204);
    }
}