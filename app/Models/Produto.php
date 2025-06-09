<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos'; // Nome da tabela no banco

    protected $primaryKey = 'ID_Produto'; // Nome da chave primária

    public $timestamps = false;

    
    protected $fillable = [
        'Nome',
        'Preco',
        'Quantidade_Estoque'
    ];
}
