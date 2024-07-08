<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    protected $table = 'categorias';

    // Especifica a chave primária se não for 'id'
    protected $primaryKey = 'id_categoria';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nm_categoria'
        ]; 

        public $timestamps = true;
    public function livros()
    {
    return $this->hasMany(Livro::class, 'id_categoria', 'id_categoria');
    }

    
}

