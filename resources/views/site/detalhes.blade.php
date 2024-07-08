<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Biblioteca - avançada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
   
<div class="container">
    <h2>Bem vindo a Biblioteca</h2>
  
          

      <p><strong>Livro Nº:</strong> {{ $livro->id_livro }}</p>
        <p><strong>Nome:</strong> {{ $livro->nm_livro }}</p>
        <p><strong>Categoria:</strong> {{ $livro->categoria->nm_categoria}}</p>
        <p><strong>Autor:</strong> {{ $livro->autor->nm_autor}}</p>
        <p><strong>Editora:</strong>{{ $livro->nm_editora }}</span></p>
        <p><strong>Data de Publicação:</strong> {{ $livro->data_publicacao }}</p>
        <p><strong>ISBN:</strong> {{ $livro->cd_isbn }}</span></p>
        <p><strong>Status:</strong> {{ $livro->dsc_status }}</p>
        @if ($livro->emprestimo)
        <p><strong>Situacao:</strong> {{ $livro->emprestimo->nm_situacao_pagamento}}</p>
        <p><strong>Data do Emprestimo:</strong> {{ \Carbon\Carbon::parse($livro->emprestimo->dt_emprestimo)->format('d/m/Y') }}</p>
        <p><strong>Data da Devolução:</strong> {{ \Carbon\Carbon::parse($livro->emprestimo->dt_entrega)->format('d/m/Y') }}</p>
        <p><strong>Dias Para Entrega:</strong> {{ $diasFaltantes }} dias</p>
        <p><strong>Nome Usuario com livro:</strong> {{ $livro->emprestimo && $livro->emprestimo->user ? $livro->emprestimo->user->nm_user : '-' }} </p>

       

       


        @else
        <p><strong>Situacao do Pagamento :</strong> - </p>
        <p><strong>Data do Emprestimo:</strong> - </p>
        <p><strong>Data da Devolução:</strong> - </p>
        <p><strong>Dias Para Entrega:</strong>- </p>
        @endif
       
        
        @if ($livro->emprestimo)
       
        <a  href={{ url('livros/' . $livro->id_livro . '/edit') }} ><button type="button" class="btn btn-primary">Editar</button></a>
        
        <form action="{{ url('livros/' . $livro->id_livro) }}" method="POST" style="display: inline;">
        <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger">Deletar Livro</button>
</form>
         <a href="/livros"><button type="button" class="btn btn-secondary">Voltar</button></a>
        


        @else

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalEmprestimo">Novo Emprestimo</button>
        <a  href={{ url('livros/' . $livro->id_livro . '/edit') }} ><button type="button" class="btn btn-primary">Editar</button></a>
        <form action="{{ url('livros/' . $livro->id_livro) }}" method="POST" style="display: inline;">
        <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger">Deletar</button>
</form>
        <a href="/livros"><button type="button" class="btn btn-secondary">Voltar</button></a>
        @endif
      
</div>


<!-- Modal -->
<div class="modal fade" id="ModalEmprestimo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Emprestimo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="" method="Post">
        <p><strong>Nome:</strong> {{ $livro->nm_livro }}</p>
        <p><strong>Categoria:</strong> {{ $livro->categoria->nm_categoria}}</p>
        <p><strong>Autor:</strong> {{ $livro->autor->nm_autor}}</p>
        <p><strong>Data de Publicação:</strong> {{ $livro->data_publicacao }}</p>
        <p><strong>ISBN:</strong> {{ $livro->cd_isbn }}</span></p>
        <p><strong>Status:</strong> {{ $livro->dsc_status }}</p>
        
        <p><strong>Data do Emprestimo:</strong> 
        <input type="date" name="emprestimo" id="emprestimo"> </p>
        <p><strong>Data da Devolução:</strong> 
        <input type="date" name="devolucao" id="devolucao"> </p>
        <p><strong>Usuario:</strong>
         <select name="usuario" id="usuario">
            @foreach ( $usuarios as $usuario )
                
                <option value="{{$usuario->id_user}}">{{$usuario->nm_user}}</option>            
            @endforeach

         </select>
         <p><strong>Situacao do Pagamento :</strong> 
        <select name="situacao" id="situacao">
            <option value="Pendente"> </option>
            <option value="Pago">Pago</option>
        <option value="Pendente">Pendente</option>
        <option value="Parcial">Parcial</option>

        </select>
     </p>


       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>