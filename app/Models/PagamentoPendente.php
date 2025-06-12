<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagamentoPendente extends Model
{
    protected $table = 'pagamento_pendentes';
    protected $primaryKey = 'id_pagamento_pendente';
    public $timestamps = true;

    protected $fillable = ['data_vencimento', 'valor_pendente', 'status', 'id_venda'];

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'id_Venda', 'id_Venda');
    }
}

