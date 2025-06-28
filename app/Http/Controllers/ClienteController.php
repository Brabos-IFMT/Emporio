<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email|max:100',
            'telefone' => 'nullable|max:20',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
                         ->with('sucesso', 'Cliente cadastrado com sucesso!')->with('toast', true);
    }

    public function show($id)
    {
        $cliente = Cliente::where('id_cliente', $id)->firstOrFail();
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::where('id_cliente', $id)->firstOrFail();
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email|max:100',
            'telefone' => 'nullable|max:20',
        ]);

        $cliente = Cliente::where('id_cliente', $id)->firstOrFail();
        $cliente->update($request->all());

        return redirect()->route('clientes.index')
                         ->with('sucesso', 'Cliente atualizado com sucesso!')->with('toast', true);
    }

    public function destroy($id)
    {
        $cliente = Cliente::where('id_cliente', $id)->firstOrFail();
        $cliente->delete();

        return redirect()->route('clientes.index')
                         ->with('sucesso', 'Cliente removido com sucesso!')->with('toast', true);
    }
}
