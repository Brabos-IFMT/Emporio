<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {

            $table->id('id_produto');
            $table->string('nome', 100);
            $table->decimal('preco', 6, 2);
            $table->integer('quantidade_estoque');
            $table->timestamps();
        });
    }
};

