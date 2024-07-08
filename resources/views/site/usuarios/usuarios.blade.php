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
    <h2>Bem vindo a Biblioteca</h2>

    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AdicionarNovo">Adicionar Novo</button>
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id_user }}</td>
                    <td>{{ $usuario->nm_user }}</td>
                    <td>{{ $usuario->telefone_user }}</td>
                    <td>{{ $usuario->nm_email }}</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal"   data-bs-target="#modal-{{$usuario->id_user}}"> Informações </button>
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal"   data-bs-target="#editar-{{$usuario->id_user}}"> Editar </button>
                      <form action="{{ url('usuarios/' . $usuario->id_user) }}" method="post">
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-danger">Excluir</button>
                      </form>
                    </td>
                </tr>
     

                <div class="modal fade" id="modal-{{$usuario->id_user}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes do Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><strong>Usuario Nº:</strong> {{ $usuario->id_user }}</p>
        <p><strong>Nome:</strong> {{ $usuario->nm_user}}</p>
        <p><strong>Email:</strong> {{ $usuario->nm_email }}</p>
        <p><strong>telefone:</strong> {{ $usuario->telefone_user}}</p>                 
       
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fecha</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editar-{{$usuario->id_user}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes do Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="{{ url('usuarios/' . $usuario->id_user) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">

      <p><strong>Usuario Nº:</strong></p>
      <input type="number" name="id" id="id" value="{{$usuario->id_user}}" readonly>
        <p><strong>Nome:</strong> 
        <input type="name" name="name" id="name" value="{{ $usuario->nm_user}}"></p>
        <p><strong>Email:</strong> 
        <input type="email" name="email" id="email" value="{{ $usuario->nm_email }}"></p>
        <p><strong>telefone:</strong> 
        <input type="number" name="telefone" id="telefone" value="{{ $usuario->telefone_user}}"></p>
        <p><strong>CPF:</strong> 
        <input type="number" name="cpf" id="cpf" value="{{ $usuario->cpf_user}}"></p>   
       
       
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fecha</button>
        <button type="submit" class="btn btn-primary">Enviar alterações</button>
    </form>
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
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('usuarios')}}" method="post">
        <p><strong>Nome:</strong></p>
        <input type="text" name="nome" id="nome">
        <p><strong>CPF:</strong></p>
        <input type="number" name="cpf" id="cpf">
        <p><strong>Email:</strong></p>
        <input type="email" name="email" id="email">
        <p><strong>Senha:</strong></p>
        <input type="password" name="senha" id="senha">
        <p><strong>telefone:</strong></p>
        <input type="tel" name="telefone" id="telefone">
        <label for="status"><strong>Acesso:</strong></label>
    <select id="acesso" name="acesso">
    <option value="2"> - </option>
    <option value="2">Usuario</option>
    <option value="1">Admin</option>
    </select>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submti" class="btn btn-success">Adicionar</button>
        </form>
      </div>
    </div>
  </div>
</div>



</body>
</html>