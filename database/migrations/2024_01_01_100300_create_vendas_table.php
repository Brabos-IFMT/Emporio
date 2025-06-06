<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id('id');
            $table->decimal('valor', 6, 2);
            $table->date('data');
            $table->string('descricao', 200);
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->char('usuario_id', 1);
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('vendas');
    }
};
