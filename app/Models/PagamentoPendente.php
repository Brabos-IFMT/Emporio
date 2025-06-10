<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagamentoPendente extends Model
{
    protected $table = 'pagamento_pendentes';
    protected $primaryKey = 'ID_PagamentoPendente';
    public $timestamps = true;

    protected $fillable = ['Data_Vencimento', 'Valor_Pendente', 'Status', 'ID_Venda'];

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'ID_Venda', 'ID_Venda');
    }
}

