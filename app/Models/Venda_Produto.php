<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda_Produto extends Model
{
    protected $table = 'venda_produto';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = ['ID_Venda', 'ID_Produto', 'Preco_Unitario', 'Quantidade'];

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'ID_Venda', 'ID_Venda');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'ID_Produto', 'ID_Produto');
    }
}
