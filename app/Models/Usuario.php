<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = ['id', 'login', 'senha'];

    public function vendas() {
        return $this->hasMany(Venda::class, 'usuario_id');
    }
}
