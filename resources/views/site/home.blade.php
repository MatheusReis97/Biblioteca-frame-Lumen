@extends('site.master')
@section('content')
<style>
  body{
    background-image: url(https://images.alphacoders.com/133/thumb-1920-1339726.png);
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<div class="container" style="background-color: white; margin-top: 40px">
  <!-- <h2>{{$name}}</h2><br> -->
 
  <!-- Exibe mensagens de erro se houver -->
@if (!empty($mensagems))

    <div class="alert alert-danger">
        <ul>
            @foreach ($mensagems as $mensagem)
                <li>{{ $mensagem }}</li>
            @endforeach
        </ul>
    </div>
@endif
  

<form action="{{ url('login-submit') }}" method="POST">
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="admin@hotmail.com" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" class="form-control" name="senha" id="senha" value="admin" required>
  
  </div>
  <div>
    <a href="">esquece a senha ?</a>
  </div><br>
  <button type="submit" class="btn btn-primary">Entrar</button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Voltar</button>  
</form>
 <br>

<a href="">Criar conta</a>
</div>


@endsection