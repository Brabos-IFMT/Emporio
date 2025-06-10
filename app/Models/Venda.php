<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $primaryKey = 'ID_Venda';
    public $timestamps = true;

    protected $fillable = ['Descricao', 'Data', 'Valor', 'ID_Cliente', 'ID_Usuario'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente', 'ID_Cliente');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario', 'ID_Usuario');
    }

    public function vendaProdutos()
    {
        return $this->hasMany(Venda_Produto::class, 'ID_Venda', 'ID_Venda');
    }

    public function pagamentoPendente()
    {
        return $this->hasOne(PagamentoPendente::class, 'ID_Venda', 'ID_Venda');
    }
}
