<?php

namespace App\Http\Controllers;

use App\Services\HospitalService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HospitalController extends Controller
{
    protected HospitalService $hospitalService;

    public function __construct(HospitalService $hospitalService)
    {
        $this->hospitalService = $hospitalService;
    }

    public function index(Request $request): JsonResponse
    {
        $hospitals = $this->hospitalService->getPaginated($request);
        return response()->json($hospitals);
    }

    public function store(Request $request): JsonResponse
    {
        $hospital = $this->hospitalService->create($request);
        return response()->json(['message' => 'Hospital criado com sucesso.', 'hospital' => $hospital], 201);
    }
}