<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <style>
    body{
      background-image: url(https://www.napratica.org.br/wp-content/uploads/2019/10/livros-mais-usados.jpg);
    }

   </style> 
   
<div class="container">
    <h2 style="color:white; text-align: center;">Bem vindo a Biblioteca</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AdicionarNovo">Novo livro</button>
    <a href="usuarios"><button type="button" class="btn btn-dark">Usuarios</button></a>

    

    <table class="table table-primary table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Editora</th>
                <th>Data de Publicação</th>
                <th>ISBN</th>
                <th>Status</th>
                <th>Categoria</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->id_livro }}</td>
                    <td>{{ $livro->nm_livro }}</td>
                    <td>{{ $livro->nm_editora }}</td>
                    <td>{{ \Carbon\Carbon::parse($livro->data_publicacao)->format('d/m/Y') }}</td>
                    <td>{{ $livro->cd_isbn }}</td>
                    <td>{{ $livro->dsc_status }}</td>
                    <td>{{ $livro->categoria->nm_categoria }}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"   data-bs-target="#modal-{{$livro->id_livro}}"> Informações </button></td>
                </tr>
     

                <div class="modal fade" id="modal-{{$livro->id_livro}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes do livro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><strong>Livro Nº:</strong> {{ $livro->id_livro }}</p>
        <p><strong>Nome:</strong> {{ $livro->nm_livro }}</p>
        <p><strong>Categoria:</strong> {{ $livro->categoria->nm_categoria}}</p>
        <p><strong>Autor:</strong> {{ $livro->autor->nm_autor}}</p>
        <p><strong>Editora:</strong>{{ $livro->nm_editora }}</span></p>
        <p><strong>Data de Publicação:</strong> {{ $livro->data_publicacao }}</p>
        <p><strong>ISBN:</strong> {{ $livro->cd_isbn }}</span></p>
        <p><strong>Status:</strong> {{ $livro->dsc_status }}</p>
               
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fecha</button>
        <a href="{{ url('livros/' . $livro->id_livro) }}" class="btn btn-primary">Ver Detalhes</a>



      </div>
    </div>
  </div>
</div>

            @endforeach
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="AdicionarNovo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ url('livros') }}" method="post">
 
      <p><strong>Nome:</strong></p>
        <input type="text" name="nome" id="nome">

        <p><strong>Categoria:</strong> </p>
        <input type="text" name="categoria" id="categoria">

        <p><strong>Autor:</strong> </p>
        <input type="text" name="autor" id="autor" >

        <p><strong>Editora:</strong></p>
        <input type="text" name="editora" id="editora" >

        <p><strong>Data de Publicação:</strong></p>
        <input type="date" name="data" id="data">


        <p><strong>ISBN:</strong></p>
        <input type="number" name="isbn" id="isbn">

        <label for="status"><strong>Status:</strong></label>
    <select id="status" name="status">
    @if ($livro->dsc_status == "Disponível")
    <option value="Disponivel">Disponível</option>

    @else
    <option value="Disponivel">Disponível</option>
    @endif
  </select>


    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Salvar</button>
  
      </div>
      
      </form>
     
      </div>
    </div>
  </div>
</div>
<script>

// Evento que dispara a busca de livros
document.getElementById('btnBuscarLivros').addEventListener('click', function() {
    fetch('http://localhost:8000/livros', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + SEU_TOKEN_JWT,
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Aqui você pode manipular os dados recebidos, exibir na tela, etc.
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});
</script>


</body>
</html>