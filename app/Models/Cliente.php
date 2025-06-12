<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = true;

    protected $fillable = ['nome', 'email', 'telefone'];

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'id_cliente', 'id_cliente');
    }
}
