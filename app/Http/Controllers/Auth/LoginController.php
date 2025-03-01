<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Models\Vistas\VtUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        //$usuario = VtUsuario::where('codigo', $request->usuario)->first();

        // Intentar autenticar usando el personal_id
        if (Auth::attempt(['codigo' => $request->codigo, 'password' => $request->password])) {
            return redirect()->intended('/home');
        }

        return back()->withErrors(['codigo' => 'Credenciales inválidas']);
        
    }
}
