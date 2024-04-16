<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_representantes', function (Blueprint $table) {
            $table->id();
            $table->text('nome');
            $table->text('email');
            $table->text('data_nascimento');
            $table->text('celular');
            $table->text('cep');
            $table->text('endereco');
            $table->text('bairro');
            $table->text('cidade');
            $table->text('complemento');
            $table->text('resposta-1');
            $table->text('resposta-2');
            $table->text('resposta-3');
            $table->text('resposta-4');
            $table->text('resposta-5');
            $table->text('conhecimento')->nullable();
            $table->text('funcionarios')->nullable();
            $table->text('referencia-1')->nullable();
            $table->text('referencia-2')->nullable();
            $table->text('referencia-3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_representantes');
    }
};
