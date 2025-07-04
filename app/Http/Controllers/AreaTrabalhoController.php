<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;
use App\Models\Cliente;
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

        // Cálculos para os dashboards
        $vendasDoDia = Venda::whereDate('created_at', now()->toDateString())->count();
        $vendasUltimos30Dias = Venda::where('created_at', '>=', now()->subDays(30))->count();

        $totalProdutosVendidos = DB::table('venda_produto')->sum('quantidade');
        $produtosVendidosUltimos30Dias = DB::table('venda_produto')
            ->join('vendas', 'venda_produto.id_venda', '=', 'vendas.id_venda')
            ->where('vendas.created_at', '>=', now()->subDays(30))
            ->sum('venda_produto.quantidade');
       

        $totalClientes = Cliente::count();
        $clientesUltimos30Dias = Cliente::where('created_at', '>=', now()->subDays(30))->count();
        

        $vendasDoDia = Venda::whereDate('created_at', now()->toDateString())->count();

        $labels = ['Jan', 'Fev', 'Mar', 'Abr'];
        $data = [120, 90, 150, 180];

        // Retorna a view com os dados
        return view('area_trabalho', compact( 'totalVendas', 'receitaTotal', 'topProdutos', 'produtos', 'labels', 'data',
                                                                    'vendasDoDia',
                                                                    'totalProdutosVendidos',
                                                                    'totalClientes'));
    }
}