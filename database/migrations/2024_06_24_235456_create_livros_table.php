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
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id_livro');
            $table->string('nm_livro', 100);
            $table->string('nm_editora', 50);
            $table->date('data_publicacao');
            $table->string('cd_isbn', 13);
            $table->text('dsc_status');
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->unsignedBigInteger('id_autor')->nullable();
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
            $table->foreign('id_autor')->references('id_autor')->on('autores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
