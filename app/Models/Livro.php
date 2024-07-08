<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Livro extends Model
{
    
    protected $table = 'livros';

    // Especifica a chave primária se não for 'id'
    protected $primaryKey = 'id_livro';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nm_livro', 
        'nm_editora', 
        'data_publicacao', 
        'cd_isbn', 
        'desc_status',
        'id_categoria',
        'id_autor']; 

        public $timestamps = true;

        public function categoria()
        {
            return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
        }

        public function autor()
        {
            return $this->belongsTo(Autore::class, 'id_autor', 'id_autor');
        }

        public function emprestimo()
        {
            return $this->belongsTo(Emprestimo::class, 'id_livro', 'id_livro');
        }

        public static function ApresentarLivros()
        {
            return self::with('categoria', 'autor', 'emprestimo')->get();
        }

       

        
}
