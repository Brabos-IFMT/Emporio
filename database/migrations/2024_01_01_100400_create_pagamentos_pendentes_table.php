<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pagamento_pendentes', function (Blueprint $table) {
            $table->id('id_pagamento_pendente');
            $table->date('data_vencimento');
            $table->decimal('valor_pendente', 6, 2);
            $table->string('status', 20);
            $table->unsignedBigInteger('id_venda');
            $table->timestamps();

            $table->foreign('id_venda')->references('id_venda')->on('vendas')->onDelete('cascade');
        });
    }
};
