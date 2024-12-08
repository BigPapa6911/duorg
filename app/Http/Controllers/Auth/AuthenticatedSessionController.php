<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthenticatedSessionController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function store(Request $request): Response
    {
        $this->authService->login($request);
        return response()->noContent();
    }

    public function destroy(Request $request): Response
    {
        $this->authService->logout($request);
        return response()->noContent();
    }
}