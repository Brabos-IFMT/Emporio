<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
<<<<<<< Updated upstream
    protected $table = 'produtos'; // Nome da tabela no banco

    protected $primaryKey = 'ID_Produto'; // Nome da chave primária

    public $timestamps = false;

    
    protected $fillable = [
        'Nome',
        'Preco',
        'Quantidade_Estoque'
    ];
=======
    protected $table = 'produtos';
    protected $primaryKey = 'ID_Produto';
    public $timestamps = true;

    protected $fillable = ['Nome', 'Preco', 'Quantidade_Estoque'];

    public function vendaProdutos()
    {
        return $this->hasMany(Venda_Produto::class, 'ID_Produto', 'ID_Produto');
    }
>>>>>>> Stashed changes
}
