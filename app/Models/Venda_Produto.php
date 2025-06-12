<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda_Produto extends Model
{
    protected $table = 'venda_produto';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = ['id_venda', 'id_produto', 'preco_unitario', 'quantidade'];

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'id_venda', 'id_venda');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto', 'id_produto');
    }
}
