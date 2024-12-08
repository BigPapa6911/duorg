<?php

namespace App\Services;

use App\Models\Hospital;

class HospitalService
{
    public function getPaginated($request)
    {
        $perPage = $request->query('per_page', 10);
        return Hospital::query()->paginate($perPage);
    }

    public function create($data)
    {
        return Hospital::create($data->only([
            'name', 'cnpj', 'address', 'cep', 'phone', 'email', 'status',
        ]));
    }
}