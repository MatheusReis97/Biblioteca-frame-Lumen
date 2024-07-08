@extends('site.master')
@section('content')
<style>
  body{
    background-image: url(https://s2.glbimg.com/p71lnqMrToEIc_3v8TPC8-qLcnw=/e.glbimg.com/og/ed/f/original/2016/03/28/trinity-college-1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<div class="container" style="background-color: white; margin-top: 40px">
  <h2>{{$name}}</h2><br>

<form action="/login-submit" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" class="form-control" name="senha" id="senha" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>

</div>
@endsection