<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'ID_Cliente';
    public $timestamps = true;

    protected $fillable = ['Nome', 'Email', 'Telefone'];

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'ID_Cliente', 'ID_Cliente');
    }
}
