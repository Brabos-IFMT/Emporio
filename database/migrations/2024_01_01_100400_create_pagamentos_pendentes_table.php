<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pagamento_pendentes', function (Blueprint $table) {
            $table->id('ID_PagamentoPendente');
            $table->date('Data_Vencimento');
            $table->decimal('Valor_Pendente', 6, 2);
            $table->string('Status', 20);
            $table->unsignedBigInteger('ID_Venda');
            $table->timestamps();

            $table->foreign('ID_Venda')->references('ID_Venda')->on('vendas')->onDelete('cascade');
        });
    }
};
