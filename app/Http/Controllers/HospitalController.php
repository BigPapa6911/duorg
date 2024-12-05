<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        return Hospital::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|unique:hospitais,nome',
            'cidade' => 'required|string',
            'estado' => 'required|string',
        ]);

        return Hospital::create($data);
    }

    public function show($id)
    {
        return Hospital::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $hospital = Hospital::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|unique:hospitais,nome,' . $id,
            'cidade' => 'sometimes|string',
            'estado' => 'sometimes|string',
        ]);

        $hospital->update($data);
        return $hospital;
    }

    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();
        return response(null, 204);
    }
}