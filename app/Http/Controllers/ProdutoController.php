<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    // Mostrar todos os produtos
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    // Mostrar o formulário para criar um novo produto
    public function create()
    {
        return view('produtos.create');
    }

    // Salvar um novo produto no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required|max:100',
            'Preco' => 'required|numeric',
            'Quantidade_Estoque' => 'required|integer',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto cadastrado com sucesso!');
    }

    // Mostrar os detalhes de um produto (opcional)
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.show', compact('produto'));
    }

    // Mostrar o formulário para editar um produto
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    // Atualizar os dados do produto no banco
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nome' => 'required|max:100',
            'Preco' => 'required|numeric',
            'Quantidade_Estoque' => 'required|integer',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    // Excluir o produto do banco de dados
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto excluído com sucesso!');
    }
}
