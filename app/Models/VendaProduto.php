<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class VendaProduto extends Pivot {
    protected $table = 'venda_produto';
    public $incrementing = false;
    protected $fillable = ['venda_id', 'produto_id', 'quantidade', 'preco_unitario'];
}
