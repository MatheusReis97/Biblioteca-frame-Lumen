<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UsuariosModel;

class Usuarios extends Controller
{
    public function ApresentacaoUsuarios(){

        $usuarios=UsuariosModel::ApresentarUsuarios();

        return view("site.usuarios.usuarios",[
            'usuarios'=>$usuarios
        ]);
    }

    public function AdicionarUser(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|string|max:100',
            'cpf' => 'required|numeric',
            'email' =>'required|string|max:100',
            'senha'=> 'required|string|max:80',
            'telefone'=> 'required|numeric' 
        ]);

        $usuario = new UsuariosModel();
        $usuario->nm_user =$request->input('nome');
        $usuario->cpf_user =$request->input('cpf');
        $usuario->login_user =$request->input('email');
        $usuario->password_user =$request->input('senha');
        $usuario->telefone_user = $request->input('telefone');
        $usuario->nm_email =$request->input('email');
        $usuario->cd_acesso =$request->input('acesso');
    
        $usuario->save();

        return redirect('usuarios');
        
    }

    public function EditarUsuario(Request $request, $id){

        $usuario = UsuariosModel::findOrFail($id);

        $usuario->nm_user =$request->input('name');
        $usuario->cpf_user =$request->input('cpf');
        $usuario->login_user =$request->input('email');
        $usuario->telefone_user = $request->input('telefone');
        $usuario->nm_email =$request->input('email');
        

         $usuario->save();


        return redirect('usuarios');
    }
    


    public function ExcluirUsuario($id)
    {
        $usuarios=UsuariosModel::findOrFail($id);
       
       if($usuarios->emprestimo->isEmpty()){
            $usuarios->delete();
            return redirect('usuarios');
        }elseif ($usuarios->emprestimo && $usuarios->emprestimo->nm_situacao_pagamento == 'Pago') {
            $usuarios->emprestimo->delete();
            $usuarios->delete();
            return redirect('usuarios');
        } else{
            $usuarios->delete();
           
        } 
            // FALTANDO RETORNA MENSAGEM CASO A PESSOA NÃO TENHA SITUACAO COMO PAGA.
        

        return view("site.usuarios.usuarios",
        [
            'usuarios'=>$usuarios
        ]
    );
    }

}
