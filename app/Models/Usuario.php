<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'ID_Usuario';
    public $timestamps = true;

    protected $fillable = ['Nome', 'Login', 'Senha'];

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'ID_Usuario', 'ID_Usuario');
    }
}

