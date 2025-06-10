<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id('ID_Venda');
            $table->string('Descricao', 200);
            $table->date('Data');
            $table->decimal('Valor', 6, 2);
            $table->unsignedBigInteger('ID_Cliente');
            $table->unsignedBigInteger('ID_Usuario');
            $table->timestamps();

            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('ID_Usuario')->references('ID_Usuario')->on('usuarios')->onDelete('cascade');
        });
    }
};
