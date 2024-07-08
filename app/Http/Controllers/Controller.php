<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Livro as LivroModel;
use Illuminate\Http\Request;

class Controller extends BaseController
{
        public function acesso()
        {
            return view("site.livros");
        }

        public function ApresentacaoLivros()
        {
            
           $livros =LivroModel::ApresentarLivros();

           
            return view('site.livros', ['livros' => $livros]);
        }

        

}
