<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    // Especifica o nome da tabela associada ao modelo
    protected $table = 'autores';

    // Especifica a chave primária se for diferente de 'id'
    protected $primaryKey = 'id_autor';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nm_autor'  
    ]; 

    // Define se deve manter timestamps (created_at e updated_at)
    public $timestamps = true;

    // Define o relacionamento: um autor possui muitos livros
    public function livros()
    {
        // Retorna a relação de 'hasMany' com o modelo 'Livro'
        // 'id_autor' é a chave estrangeira na tabela 'livros' que referencia 'autores'
        // 'id_autor' é a chave primária na tabela 'autores'
        return $this->hasMany(Livro::class, 'id_autor', 'id_autor');
    }
}
