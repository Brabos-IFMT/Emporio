<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pagamentos_pendentes', function (Blueprint $table) {
            $table->id('id'); 
            $table->decimal('valor_pendente', 6, 2);
            $table->date('data_vencimento');
            $table->unsignedBigInteger('venda_id');
            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pagamentos_pendentes');
    }
};
