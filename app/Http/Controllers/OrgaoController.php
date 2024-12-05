<?php

namespace App\Http\Controllers;

use App\Models\Orgao;
use Illuminate\Http\Request;

class OrgaoController extends Controller
{
    public function index()
    {
        return Orgao::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|unique:orgaos,nome',
        ]);

        return Orgao::create($data);
    }

    public function show($id)
    {
        return Orgao::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $orgao = Orgao::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|unique:orgaos,nome,' . $id,
        ]);

        $orgao->update($data);
        return $orgao;
    }

    public function destroy($id)
    {
        $orgao = Orgao::findOrFail($id);
        $orgao->delete();
        return response(null, 204);
    }
}