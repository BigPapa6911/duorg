<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            abort(401, 'Credenciais inválidas.');
        }
        $request->session()->regenerate();
    }

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
};