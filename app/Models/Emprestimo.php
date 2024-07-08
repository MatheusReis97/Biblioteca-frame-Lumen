<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';

    // Especifica a chave primária se não for 'id'
    protected $primaryKey = 'id_emprestimo';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'dt_emprestimo',
        'dt_entrega',
        'cd_situacao',
        'nm_situacao_pagamento',
        'id_livro', 
        'id_user'
        ]; 

        public $timestamps = true;


        public function Livro()
        {
            return $this->belongsTo(Livro::class, 'id_livro', 'id_livro');
        }
        public function user()
        {
            return $this->belongsTo(User::class, 'id_user', 'id_user');
        }

}
