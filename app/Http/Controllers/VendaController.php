<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Venda_Produto;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        $produtos = Produto::all();
        $vendas = Venda::with('cliente', 'usuario')->get();
        return view('vendas.index', compact('clientes', 'usuarios', 'produtos', 'vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        $produtos = Produto::all();
        $vendaProdutos = session()->get('vendaProdutos', []);
        $vendaForm = session()->get('vendaForm', []);

        $totalValor = array_sum(array_map(function ($item) {
            return $item['preco'] * $item['quantidade'];
        }, $vendaProdutos));

        $totalValorFormatado = number_format($totalValor, 2, ',', '.');

        return view('vendas.create', compact('clientes', 'usuarios', 'produtos', 'vendaProdutos', 'totalValorFormatado', 'vendaForm'));
    }

    public function registrarProdutoVenda(Request $request)
    {
        try {
            if ($request->filled('descricao') && $request->filled('data') && $request->filled('id_cliente')) {
                session()->put('vendaForm', [
                    'descricao' => $request->input('descricao'),
                    'data' => $request->input('data'),
                    'id_cliente' => $request->input('id_cliente'),
                ]);
            }

            $produto = Produto::findOrFail($request->produto_id);
            $vendaProdutos = session()->get('vendaProdutos', []);
            $quantidadeSolicitada = $request->quantidade;

            if (!$produto)
                return redirect()->back()
                    ->with('erro', 'Produto inválido.')
                    ->with('toast', true);

            if ($quantidadeSolicitada < 1)
                return redirect()->back()
                    ->with('erro', 'Quantidade deve ser maior que 0.')
                    ->with('toast', true);

            if (isset($vendaProdutos[$produto->id_produto])) {
                $quantidadeAtual = $vendaProdutos[$produto->id_produto]['quantidade'];
                $novaQuantidade = $quantidadeAtual + $quantidadeSolicitada;

                if ($novaQuantidade > $produto->quantidade_estoque) {
                    return redirect()->back()
                        ->with('erro', 'Quantidade excede o estoque disponível.')
                        ->with('toast', true);
                }

                $vendaProdutos[$produto->id_produto]['quantidade'] = $novaQuantidade;
            } else {
                // Produto ainda não está no carrinho
                if ($quantidadeSolicitada > $produto->quantidade_estoque) {
                    return redirect()->back()
                        ->with('erro', 'Estoque insuficiente para a quantidade solicitada.')
                        ->with('toast', true);
                }

                $vendaProdutos[$produto->id_produto] = [
                    'id_produto' => $produto->id_produto,
                    'nome' => $produto->nome,
                    'preco' => $produto->preco,
                    'quantidade' => $quantidadeSolicitada,
                ];
            }

            session()->put('vendaProdutos', $vendaProdutos);

            return redirect()->back()
                ->with('sucesso', 'Produto adicionado com sucesso!')
                ->with('toast', true);
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('erro', 'Não foi possível adicionar o produto!')
                ->with('toast', true);
        }
    }

    public function limparProdutoVenda()
    {
        session()->forget('vendaProdutos');
        return redirect()->back()
            ->with('sucesso', 'Limpo com sucesso.')
            ->with('toast', true);
    }

    public function RemoverProdutoVenda($id)
    {
        $vendaProdutos = session()->get('vendaProdutos', []);

        if (isset($vendaProdutos[$id])) {
            unset($vendaProdutos[$id]);
            session()->put('vendaProdutos', $vendaProdutos);
        }

        return redirect()->back()
            ->with('sucesso', 'Produto removido com sucesso!')
            ->with('toast', true);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $vendaProdutos = session()->get('vendaProdutos', []);
            $usuario = session('usuario');

            if (empty($usuario))
                return redirect()->back()
                    ->with('erro', 'Não foi encontrado nenhum usuario logado.')
                    ->withInput();

            if (empty($vendaProdutos))
                return redirect()->back()
                    ->with('erro', 'O carrinho está vazio.')
                    ->withInput();

            // verificar quantidades novamente
            foreach ($vendaProdutos as $vendaProduto) {
                $produto = Produto::find($vendaProduto['id_produto']);
                if (!$produto) {
                    return redirect()->back()
                        ->with('erro', "Produto com ID {$vendaProduto['id_produto']} não encontrado.")
                        ->withInput();
                }

                if ($vendaProduto['quantidade'] > $produto->quantidade_estoque) {
                    return redirect()->back()
                        ->with('erro', "Estoque insuficiente para o produto {$produto->nome}. Estoque disponível: {$produto->quantidade_estoque}, quantidade solicitada: {$vendaProduto['quantidade']}.")
                        ->withInput();
                }
            }

            $totalValor = array_sum(array_map(function ($item) {
                return $item['preco'] * $item['quantidade'];
            }, $vendaProdutos));

            $venda = Venda::create([
                'descricao' => $request->descricao,
                'data' => $request->data,
                'valor' => $totalValor,
                'id_cliente' => $request->id_cliente,
                'id_usuario' => $usuario->id_usuario,
            ]);

            foreach ($vendaProdutos as $vendaProduto) {
                Venda_Produto::create([
                    'id_venda' => $venda->id_venda,
                    'id_produto' => $vendaProduto['id_produto'],
                    'preco_unitario' => $vendaProduto['preco'],
                    'quantidade' => $vendaProduto['quantidade'],
                ]);

                Produto::where('id_produto', $vendaProduto['id_produto'])
                    ->decrement('quantidade_estoque', $vendaProduto['quantidade']);
            }

            session()->forget('vendaProdutos');
            session()->forget('vendaForm');

            DB::commit();
            return redirect()->route('vendas.index')
                ->with('sucesso', 'Venda cadastrada com sucesso!')
                ->with('toast', true);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['erro' => 'Erro ao cadastrar venda: ' . $e->getMessage()])
                ->with('toast', true);
        }
    }

    public function show($id)
    {
        $venda = Venda::with('cliente', 'usuario', 'vendaProdutos')->findOrFail($id);
        return view('vendas.show', compact('venda'));
    }

    public function destroy($id)
    {
        Venda::destroy($id);
        Venda_Produto::where('id_venda', $id)->delete();
        return redirect()->route('vendas.index')->with('sucesso', 'Venda excluída com sucesso!');
    }
}
