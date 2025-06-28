<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AreaTrabalhoController extends Controller
{
    public function index()
    {
        // Verifica se o usuário está logado
        if (!session('usuario')) {
            return redirect()->route('login.form');
        }

        // Coleta de dados para os relatórios
        $totalVendas = Venda::count();
        $receitaTotal = Venda::sum('valor');
        $topProdutos = DB::table('venda_produto')
            ->join('produtos', 'venda_produto.id_produto', '=', 'produtos.id_produto')
            ->select('produtos.nome', DB::raw('SUM(venda_produto.quantidade) as quantidade_vendida'), DB::raw('SUM(venda_produto.preco_unitario * venda_produto.quantidade) as receita'))
            ->groupBy('produtos.nome')
            ->orderBy('quantidade_vendida', 'desc')
            ->get();
        $produtos = Produto::all();

        // Retorna a view com os dados
        return view('area_trabalho', compact('totalVendas', 'receitaTotal', 'topProdutos', 'produtos'));
    }
}