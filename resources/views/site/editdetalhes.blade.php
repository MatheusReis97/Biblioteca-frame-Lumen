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
    <h2>Editar Livro</h2>
  
    <form action="{{ url('livros/' . $livro->id_livro) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    
      
        <p><strong>Livro Nº:</strong></p>
        <input type="number" name="id" id="id" value="{{$livro->id_livro}}" readonly>
        <p><strong>Nome:</strong></p>
        <input type="text" name="nome" id="nome" value="{{ $livro->nm_livro }}">

        <p><strong>Categoria:</strong> </p>
        <input type="text" name="categoria" id="categoria" value="{{ $livro->categoria->nm_categoria}}">
        <select name="categoria" id="categoria">
            <option value="{{ $livro->categoria->id_categoria}}">{{ $livro->categoria->nm_categoria}}</option>
            @foreach ( $categorias as $categoria )
                <option value="{{$categoria->id_categoria}}">{{ $categoria->nm_categoria}}</option>
            @endforeach
        </select>


        <p><strong>Autor:</strong> </p>
        <input type="text" name="autor" id="autor" value="{{ $livro->autor->nm_autor}}">

        <p><strong>Editora:</strong></p>
        <input type="text" name="editora" id="editora" value="{{ $livro->nm_editora}}">

        <p><strong>Data de Publicação:</strong></p>
        <input type="date" name="data" id="data" value={{$livro->data_publicacao}}>


        <p><strong>ISBN:</strong></p>
        <input type="number" name="isbn" id="isbn" value="{{ $livro->cd_isbn }}">

        <label for="status"><strong>Status:</strong></label>
<select id="status" name="status">
    @if ($livro->dsc_status == "Disponível")
    <option value="Disponivel">Disponível</option>
    <option value="Não Disponivel">Não Disponível</option>
    @else
    <option value="Não Disponivel" >Não Disponível</option>
    <option value="Disponivel">Disponível</option>
    @endif

</select>
            @if ($livro->emprestimo)
        <p><strong>Situacao do Pagamento:</strong>
        <input type="text" name="situacao" id="situacao" value=" {{ $livro->emprestimo->nm_situacao_pagamento}}">
        <p><strong>Data do Emprestimo:</strong></p>
        <input type="date" name="data_emprestimo" id="data_emprestimo" value={{$livro->emprestimo->dt_emprestimo}}>
        <p><strong>Data da Devolução:</strong></p>
        <input type="date" name="data_devolucao" id="data_devolucao" value={{$livro->emprestimo->dt_entrega}}>
        <p><strong>Nome Usuario com livro:</strong></p>
        <select id="usuario" name="usuario">
            <option value="{{$livro->emprestimo->user->nm_user}}">{{$livro->emprestimo->user->nm_user}}</option>
            @foreach ($usuarios as $usuarios)
            <option value="{{$usuarios->nm_user}}">{{$usuarios->nm_user}}</option>
            @endforeach
        </select>


        @else
        <p><strong>Situacao do Pagamento :</strong> - </p>
        <p><strong>Data do Emprestimo:</strong> - </p>
        <p><strong>Data da Devolução:</strong> - </p>
        <p><strong>Dias Para Entrega:</strong>- </p>
        @endif
       


         <br><br>
        <button type="submit" class="btn btn-primary">Enviar alterações</button>
        <a href="/livros"><button type="button" class="btn btn-secondary">Voltar</button></a>
        </form>
         
</div>




</body>
</html>