<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos'; // Nome da tabela no banco

    protected $primaryKey = 'ID_Produto'; // Nome da chave primária

    public $timestamps = false;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'Nome',
        'Preco',
        'Quantidade_Estoque'
    ];
}
