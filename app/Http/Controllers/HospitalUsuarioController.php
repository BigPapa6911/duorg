<?php

namespace App\Http\Controllers;

use App\Models\HospitalUsuario;
use Illuminate\Http\Request;

class HospitalUsuarioController extends Controller
{

    public function index()
    {
        return HospitalUsuario::with(['hospital', 'usuario'])->get();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'id_hospital' => 'required|exists:hospitais,id',
            'id_user' => 'required|exists:usuarios,id',
        ]);

        return HospitalUsuario::create($data);
    }


    public function show($id)
    {
        return HospitalUsuario::with(['hospital', 'usuario'])->findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $hospitalUsuario = HospitalUsuario::findOrFail($id);

        $data = $request->validate([
            'id_hospital' => 'sometimes|exists:hospitais,id',
            'id_user' => 'sometimes|exists:usuarios,id',
        ]);

        $hospitalUsuario->update($data);
        return $hospitalUsuario;
    }

 
    public function destroy($id)
    {
        $hospitalUsuario = HospitalUsuario::findOrFail($id);
        $hospitalUsuario->delete();
        return response(null, 204);
    }
}