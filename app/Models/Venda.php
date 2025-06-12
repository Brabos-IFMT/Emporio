<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $primaryKey = 'id_venda';
    public $timestamps = true;

    protected $fillable = ['descricao', 'data', 'valor', 'id_cliente', 'id_usuario'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function vendaProdutos()
    {
        return $this->hasMany(Venda_Produto::class, 'id_venda', 'id_venda');
    }

    public function pagamentoPendente()
    {
        return $this->hasOne(PagamentoPendente::class, 'id_venda', 'id_venda');
    }
}
