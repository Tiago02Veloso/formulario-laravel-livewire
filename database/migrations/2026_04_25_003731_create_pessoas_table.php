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

            $table->string('email')->index();

            $table->string('telefone');

            $table->string('cep');

            $table->string('cpf')->unique();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};