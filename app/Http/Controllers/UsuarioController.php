<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function registroForm()
    {
        return view('registro');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'Nome' => 'required|string|max:100',
            'Login' => 'required|email|unique:usuarios,Login',
            'Senha' => 'required|string|min:6',
        ]);

        Usuario::create([
            'Nome' => $request->Nome,
            'Login' => $request->Login,
            'Senha' => bcrypt($request->Senha),
        ]);

        return redirect()->route('login.form')->with('sucesso', 'Usuário registrado com sucesso!');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Login' => 'required|email',
            'Senha' => 'required',
        ]);

        $usuario = Usuario::where('Login', $request->Login)->first();

        if ($usuario && Hash::check($request->Senha, $usuario->Senha)) {
            session(['usuario' => $usuario]);
            return redirect()->route('area_trabalho');
        }

        return back()->with('erro', 'Login ou senha inválidos.');
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
