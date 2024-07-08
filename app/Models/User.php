<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'users';

    // Especifica a chave primária se não for 'id'
    protected $primaryKey = 'id_user';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nm_user', 
        'cpf_user', 
        'login_user', 
        'password_user', 
        'telefone_user', 
        'nm_email', 
        'cd_acesso'
    ];

    // Oculta os campos que não devem ser retornados em respostas JSON
    protected $hidden = [
        'password_user'
    ];

    // // Caso o campo chave primária não seja um integer autoincrementado
    // public $incrementing = true;

    // // Define o tipo da chave primária se não for integer
    // protected $keyType = 'int';

    // Se a tabela não tiver os campos timestamps (created_at e updated_at)

    
    public function emprestimo()
    {
        return $this->hasMany(Emprestimo::class, 'id_user', 'id_user');
    }

    public static function ApresentarUsuarios()
    {
        return self::with('emprestimo')->get();
    }

  

    public $timestamps = true;


    
}
