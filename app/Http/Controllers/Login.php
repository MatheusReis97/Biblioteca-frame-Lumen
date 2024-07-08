<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class Login extends Controller
{
    public function forms(Request $request)
    {
        $data = $request->all();
        
        $user = User::where("nm_email", $data["email"])->first();

            if ($user) { 
                if ($user->password_user === $data["senha"]) {
                    return redirect('/livros');
                    }else {
                        var_dump($data);
                        return "Senha invalida";
                    }
        
    } else {
                return "Não foi possivel Efetuar Login";
    }}
}
