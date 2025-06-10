<?php

use App\Http\Controllers\UsuarioController;

Route::get('/registro', [UsuarioController::class, 'registroForm'])->name('registro.form');
Route::post('/registro', [UsuarioController::class, 'registrar'])->name('registrar.usuario');

Route::get('/', [UsuarioController::class, 'loginForm'])->name('login.form');
Route::post('/login', [UsuarioController::class, 'login'])->name('login.usuario');

Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::get('/area-trabalho', [UsuarioController::class, 'areaTrabalho'])->name('area_trabalho');


