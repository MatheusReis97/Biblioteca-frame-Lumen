<?php

namespace App\Http\Controllers;

use App\Models\Livro as LivroModel;
use App\Models\Categoria as CategoriaModel;
use App\Models\Autore as AutorModel;
use App\Models\User as UserModel;
use App\Models\Emprestimo as EmprestimoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class Livros extends Controller
{

    public function Detalhes($id)
    {
        $usuarios= UserModel::all();
        
        $livros = LivroModel::with('emprestimo.user')->findOrFail($id);
       

        if($livros->emprestimo){
        $dataEntrega = Carbon::parse($livros->emprestimo->dt_entrega);
        $diasFaltantes = Carbon::now()->diffInDays($dataEntrega, false); // O parâmetro false inclui a possibilidade de dias negativos
        }
        else {
            $diasFaltantes = 0;
        }
    

        return view('site.detalhes', [
            'livro' => $livros,
            'diasFaltantes' => $diasFaltantes,
            'usuarios' => $usuarios
    ]);
    }
    
    public function EncaminharEdicao($id)
    {
        $categorias = CategoriaModel::all();
        $usuarios= UserModel::all();
        $livro = LivroModel::findOrFail($id);
 
           
        return view('site.editdetalhes', [
            'livro' => $livro,
            'usuarios' => $usuarios,
            'categorias' => $categorias
    ]);
    }

    public function AdicionarLivro (Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|string|max:100',
            'categoria' => 'required|string|max:100',
            'autor' => 'required|string|max:100',
            'editora' => 'required|string|max:50',
            'status' => 'required|string|max:60',
            'data' => 'required|date',
            'isbn' => 'required|numeric',
        ]);



         // Criação da Categoria (ou busca se já existir)
         $categoria = CategoriaModel::firstOrCreate(['nm_categoria' => $request->input('categoria')]);

        // Criação do Autor (ou busca se já existir)
        $autor = AutorModel::firstOrCreate(['nm_autor' => $request->input('autor')]);

        $livro = new LivroModel();

        $livro->nm_livro = $request->input('nome');
        $livro->nm_editora = $request->input('editora');
        $livro->data_publicacao = $request->input('data');
        $livro->cd_isbn = $request->input('isbn');
        $livro -> dsc_status = $request -> input('status');
        $livro->categoria()->associate($categoria);
        $livro->autor()->associate($autor);
        $livro->save();

       
  

    return redirect('livros');

    }

    public function EditarLivro (Request $request , $id)
    {
        
        $livro = LivroModel::with('autor', 'categoria', 'emprestimo')->findOrFail($id);

        $livro -> nm_livro = $request -> input('nome');
        $livro -> nm_editora = $request -> input('editora');
        $livro -> data_publicacao = $request -> input('data');
        $livro -> cd_isbn = $request -> input('isbn');
        $livro -> dsc_status = $request -> input('status');
        $livro -> id_categoria = $request -> input('categoria');

        
        $nomeAutor = $request -> input('autor');
        
        $autorExist = AutorModel::where('nm_autor', $nomeAutor)->first();

            if( $autorExist){
                $idAutor = $autorExist -> id_autor;
                $livro -> id_autor = $idAutor;
            }
            else{
                $novoAutor = new AutorModel();
                $novoAutor->nm_autor = $nomeAutor;
                $novoAutor->save();

                $livro -> id_autor = $novoAutor->id_autor;
            };
             

        if($livro->emprestimo){
        $livro -> emprestimo ->dt_emprestimo = $request -> input('data_emprestimo');
        $livro -> emprestimo ->dt_entrega = $request  -> input('data_devolucao');
        $livro -> emprestimo ->nm_situacao_pagamento = $request -> input('situacao');
         $livro->emprestimo->save();
        }

         $livro->save();


        return redirect('livros/' . $livro->id_livro);
    }


    public function ExcluirLivro($id)
    {
        
        $livro = LivroModel::findOrFail($id);
  
    
        if ($livro->emprestimo && $livro->emprestimo->nm_situacao_pagamento == 'Pago') {
            $livro->emprestimo->delete();
            $livro->delete();
            return redirect('livros');
        } elseif(!$livro->emprestimo)  {
            $livro->delete();
            return redirect('livros');
        } 
            // FALTANDO RETORNA MENSAGEM CASO A PESSOA NÃO TENHA SITUACAO COMO PAGA.
    }


    public function EncaminharEmprestimo(Request $request, $id){


        $livro = LivroModel::findOrFail($id);

        $this->validate($request,[
            'emprestimo' => 'required|date',
            'devolucao' => 'required|date',
            'usuario' => 'required|numeric',
            'situacao'=> 'required|string'
        ]);
        $situacao = $request -> input('situacao');

        $emprestimo = new EmprestimoModel();

        $emprestimo -> dt_emprestimo = $request -> input('emprestimo');
        $emprestimo -> dt_entrega = $request -> input('devolucao');
        switch ($situacao){
            case "Pago":
                $emprestimo ->nm_situacao_pagamento = $request -> input('situacao');
                $emprestimo ->cd_situacao = 3 ;
                break;
            case "Parcial":
                $emprestimo ->nm_situacao_pagamento = $request -> input('situacao');
                $emprestimo ->cd_situacao = 2 ;
                break;
            case "Pendente":
                $emprestimo ->nm_situacao_pagamento = $request -> input('situacao');
                $emprestimo ->cd_situacao = 1 ;
                break;
            default :
                $emprestimo -> nm_situacao_pagamento = "Pendente";
                $emprestimo -> cd_situcao = 1;
                break;
        };
        $emprestimo-> id_livro = $livro->id_livro;
        $emprestimo-> id_user = $request -> input('usuario');
            $emprestimo -> save();

            $livro->dsc_status = "Não disponivel";
            $livro ->save();

            return redirect('livros/' . $livro->id_livro);
    }
    
}
