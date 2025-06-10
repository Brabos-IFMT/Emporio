<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {

            $table->id('ID_Produto');
            $table->string('Nome', 100);
            $table->decimal('Preco', 6, 2);
            $table->integer('Quantidade_Estoque');
            $table->timestamps();
        });
    }
};

