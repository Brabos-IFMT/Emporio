<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model {
    protected $fillable = ['valor', 'data', 'descricao', 'cliente_id', 'usuario_id'];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function produtos() {
        return $this->belongsToMany(Produto::class, 'venda_produto')
                    ->withPivot('quantidade', 'preco_unitario');
    }

    public function pagamentosPendentes() {
        return $this->hasMany(PagamentoPendente::class);
    }
}
