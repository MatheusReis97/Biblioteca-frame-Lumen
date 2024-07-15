<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Login extends Controller
{
    public function forms(Request $request)
{
    $data = $request->all();
    
    $user = User::where('nm_email', $data['email'])->first();
    $mensagems = []; // Inicializa um array para armazenar as mensagens de erro
    
    if ($user) {
        if ($user->password_user === $data['senha']) {
            return redirect('/livros');
        } else {
            $mensagems[] = 'Senha Inválida'; // Adiciona mensagem ao array de erros
        }
    } else {
        $mensagems[] = 'Email Inválido'; // Adiciona mensagem ao array de erros
    }
    
    // Passa o array de mensagens de erro para a view
    return view('site.home', ['title'=> 'Biblioteca - Home', 'name' => 'Biblioteca',
        'mensagems' => $mensagems
    ]);
}

    
}