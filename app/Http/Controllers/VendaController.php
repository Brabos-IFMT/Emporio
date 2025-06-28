<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Venda_Produto;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $vendas = Venda::with('cliente', 'usuario')->get();
        return view('vendas.create', compact('clientes', 'usuarios', 'produtos', 'vendas'));
    }


    public function store(Request $request)
    {
        $usuario = session('usuario');
        
        

        DB::beginTransaction();

        try {
            
            $venda = Venda::create([
                'descricao' => $request->descricao,
                'data' => $request->data,
                'valor' => $request->valor,
                'id_cliente' => $request->id_cliente,
                'id_usuario' => $request->id_usuario,
                
            ]);
            
            foreach ($request->produtos as $produto) {
                Venda_Produto::create([
                    'id_venda' => $venda->id_venda,
                    'id_produto' => $produto['id_produto'],
                    'preco_unitario' => $produto['preco_unitario'],
                    'quantidade' => $produto['quantidade'],
                ]);
            }

            DB::commit();
            return redirect()->route('vendas.index')->with('sucesso', 'Venda cadastrada com sucesso!')->with('toast', true);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Erro ao cadastrar venda: ' . $e->getMessage())->with('toast', true);
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
