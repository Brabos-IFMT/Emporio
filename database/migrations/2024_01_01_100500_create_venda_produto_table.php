<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
        {
        Schema::create('venda_produto', function (Blueprint $table) {
            $table->decimal('preco_unitario', 6, 2);
            $table->integer('quantidade');
            $table->unsignedBigInteger('id_venda');
            $table->unsignedBigInteger('id_produto');

            $table->primary(['id_venda', 'id_produto']);
            $table->foreign('id_venda')->references('id_venda')->on('vendas')->onDelete('cascade');
            $table->foreign('id_produto')->references('id_produto')->on('produtos')->onDelete('cascade');
        });
    }
};
