<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('cep');

            // CPF único
            $table->string('cpf')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};