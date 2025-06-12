<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nome', 100);
            $table->string('login', 100);
            $table->string('senha', 80);
            $table->enum('tipo_usuario', ['admin', 'comum'])->default("comum");
            $table->timestamps();
        });
    }
};
