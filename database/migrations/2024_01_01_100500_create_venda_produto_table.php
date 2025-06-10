<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
        {
        Schema::create('venda_produto', function (Blueprint $table) {
            $table->decimal('Preco_Unitario', 6, 2);
            $table->integer('Quantidade');
            $table->unsignedBigInteger('ID_Venda');
            $table->unsignedBigInteger('ID_Produto');

            $table->primary(['ID_Venda', 'ID_Produto']);
            $table->foreign('ID_Venda')->references('ID_Venda')->on('vendas')->onDelete('cascade');
            $table->foreign('ID_Produto')->references('ID_Produto')->on('produtos')->onDelete('cascade');
        });
    }
};
