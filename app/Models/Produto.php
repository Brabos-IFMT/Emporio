<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';
    public $timestamps = true;

    protected $fillable = ['nome', 'preco', 'quantidade_estoque'];

    public function vendaProdutos()
    {
        return $this->hasMany(Venda_Produto::class, 'id_produto', 'id_produto');
    }
}
