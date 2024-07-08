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
        
            Schema::create('emprestimos', function (Blueprint $table) {
                $table->bigIncrements('id_emprestimo');// Define id como chave primária auto_incrementável
                $table->date('dt_emprestimo');
                $table->date('dt_entrega');
                $table->integer('cd_situacao');
                $table->string('nm_situacao_pagamento',50);
                $table->unsignedBigInteger('id_livro');
                $table->foreign('id_livro')->references('id_livro')->on('livros');
                $table->unsignedBigInteger('id_user');
                $table->foreign('id_user')->references('id_user')->on('users');          
                $table->timestamps();
            });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
