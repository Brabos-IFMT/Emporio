<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = true;

    protected $fillable = ['nome', 'login', 'senha'];

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'id_usuario', 'id_usuario');
    }
}

