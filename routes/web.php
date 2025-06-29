<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AreaTrabalhoController;




Route::get('/registro', [UsuarioController::class, 'registroForm'])->name('registro.form');
Route::post('/registro', [UsuarioController::class, 'registrar'])->name('registrar.usuario');

Route::get('/', [UsuarioController::class, 'loginForm'])->name('login.form');
Route::post('/login', [UsuarioController::class, 'login'])->name('login.usuario');

Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::get('/area-trabalho', [AreaTrabalhoController::class, 'index'])->name('area_trabalho');


Route::resource('produtos', ProdutoController::class);
Route::resource('vendas', VendaController::class);
Route::resource('clientes', ClienteController::class);

Route::post("/registrar-produto", [VendaController::class, "registrarProdutoVenda"])->name("pdv.adicionar");
Route::post("/limpar-produtos", [VendaController::class, "limparProdutoVenda"])->name("pdv.limpar");
Route::delete("/remover-produto/{id}", [VendaController::class, "RemoverProdutoVenda"])->name("pdv.removerProduto");

