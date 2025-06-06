<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagamentoPendente extends Model {
    protected $fillable = ['valor_pendente', 'data_vencimento', 'venda_id'];

    public function venda() {
        return $this->belongsTo(Venda::class);
    }
}

