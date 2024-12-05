<?php

namespace App\Http\Controllers;

use App\Models\RelacaoUsuarioOrgao;
use Illuminate\Http\Request;

class RelacaoUsuarioOrgaoController extends Controller
{
    public function index()
    {
        return RelacaoUsuarioOrgao::with(['usuario', 'orgao'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_user' => 'required|exists:usuarios,id',
            'id_orgao' => 'required|exists:orgaos,id',
            'tipo' => 'required|in:Doador,Receptor',
        ]);

        return RelacaoUsuarioOrgao::create($data);
    }

    public function show($id)
    {
        return RelacaoUsuarioOrgao::with(['usuario', 'orgao'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $relacao = RelacaoUsuarioOrgao::findOrFail($id);

        $data = $request->validate([
            'id_user' => 'sometimes|exists:usuarios,id',
            'id_orgao' => 'sometimes|exists:orgaos,id',
            'tipo' => 'sometimes|in:Doador,Receptor',
        ]);

        $relacao->update($data);
        return $relacao;
    }

    public function destroy($id)
    {
        $relacao = RelacaoUsuarioOrgao::findOrFail($id);
        $relacao->delete();
        return response(null, 204);
    }
}