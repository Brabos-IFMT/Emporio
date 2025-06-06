<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
    protected $fillable = ['nome', 'preco', 'quantidade_estoque'];

    public function vendas() {
        return $this->belongsToMany(Venda::class, 'venda_produto')
                    ->withPivot('quantidade', 'preco_unitario');
    }
}
