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
        Schema::create('users', function (Blueprint $table) {
             $table->bigIncrements('id_user'); // Define cd_user como chave primária auto_incrementável
            $table->string('nm_user', 100);
            $table->string('cpf_user', 15)->unique();
            $table->string('login_user', 100);
            $table->string('password_user', 80);
            $table->string('telefone_user', 25);
            $table->string('nm_email', 100)->unique();
            $table->integer('cd_acesso'); // Campo para armazenar acesso, não definido como auto_increment
            $table->timestamps(); // Cria automaticamente created_at e updated_at
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
