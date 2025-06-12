<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function registroForm()
    {
        return view('auth.registro');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'login' => 'required|email|unique:usuarios,login',
            'senha' => 'required|string|min:6',
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'login' => $request->login,
            'senha' => bcrypt($request->senha),
        ]);

        return redirect()->route('login.form')->with('sucesso', 'Usuário registrado com sucesso!');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = Usuario::where('login', $request->login)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            session(['usuario' => $usuario]);
            return redirect()->route('area_trabalho');
        }

        return back()->with('erro', 'login ou senha inválidos.');
    }

    public function areaTrabalho()
    {
        if (!session('usuario')) {
            return redirect()->route('login.form');
        }

        return view('area_trabalho');

    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('login.form');
    }
}
