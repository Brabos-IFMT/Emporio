<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['preco'] = (float) str_replace(['R$', '.', ','], ['', '', '.'], $dados['preco']);

        $validated = Validator::make($dados, [
            'nome' => 'required|string|max:100',
            'preco' => 'required|numeric',
            'quantidade_estoque' => 'required|integer|min:1',
        ])->validate();

        Produto::create($validated);

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($produto)
    {
        $produto = Produto::findOrFail($produto);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $dados = $request->all();
        $dados['preco'] = (float) str_replace(['R$', '.', ','], ['', '', '.'], $dados['preco']);

        $validated = Validator::make($dados, [
            'nome' => 'required|string|max:100',
            'preco' => 'required|numeric',
            'quantidade_estoque' => 'required|integer|min:1',
        ])->validate();

        $produto->update($validated);

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto excluído com sucesso!');
    }
}
