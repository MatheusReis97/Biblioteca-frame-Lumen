<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- esse title está sendo chamado na home.controller fuction index -->
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script><body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BIBLIOTECA-Lumen</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
   
        </li>
      </ul>
      <div class="d-flex">
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#Menulogin" aria-controls="offcanvasExample">
        Login
        </button>

      </div>
    </div>
  </div>
</nav>


<div class="offcanvas offcanvas-end" tabindex="-1" id="Menulogin" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Área de Login</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="container">
        @yield('content')
    </div>
    </div>
  </div>
</div><br>

<div class="container" style="background-color:white; text-align: center;">

    <h1 style="color:Green;"><strong>SEJA BEM VINDO A BIBLIOTECA-LUMEN</strong></h1>
    <p>Aplicação desenvolvido para aprimorar as habilidades com a utilização de ferramentas e linguagem. </p>

</div>
<div class="container" style="background-color:white;">
    <div class="row">
        <div class="col-8">
      <p>
      Essa aplicação se assemelha a um sistema de gerenciamento de biblioteca física, onde os usuários podem procurar livros disponíveis nas prateleiras ou solicitar informações diretamente aos colaboradores da biblioteca. Além disso, o sistema permite verificar a disponibilidade dos livros e facilitar o processo de locação, tornando a experiência de empréstimo mais eficiente e organizada.
      </p>  
        </div>
        <div class="col-4">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREmcYIxbY2VnFTeh7iqhaHJGTRirOBTGXX7Q&s" alt="imagem de livros">
        </div>
    </div><br>
</div><br><br>

<div class="container" style="background-color:black; text-align: center;">

    <h3 style="color:Green;"><strong>Encontre conosco</strong></h3>
   <br>
   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="d-flex flex-wrap justify-content-around">
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/71spFy89VXL._SL1500_.jpg" class="card-img-top" alt="Livro - Café com Deus Pai">
          <div class="card-body">
            <h5 class="card-title">Café com Deus Pai</h5>
            <p class="card-text">Junior Rostirola</p>
          </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/E-assim-que-acaba.jpg" class="card-img-top" alt="Livro - É assim que acaba">
          <div class="card-body">
            <h5 class="card-title">É assim que acaba</h5>
            <p class="card-text">Colleen Hoover</p>
          </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/E-assim-que-comeca.jpg" class="card-img-top" alt="Livro - É assim que começa">
          <div class="card-body">
            <h5 class="card-title">É assim que começa</h5>
            <p class="card-text">Colleen Hoover</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex flex-wrap justify-content-around">
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/Onde-estao-as-flores.jpg" class="card-img-top" alt="Livro -  Onde estão as flores? ">
          <div class="card-body">
            <h5 class="card-title"> Onde estão as flores? </h5>
            <p class="card-text"> Ilko Minev</p>
          </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/Mais-esperto-que-o-diabo.jpg" class="card-img-top" alt="Livro -  Mais esperto que o diabo">
          <div class="card-body">
            <h5 class="card-title"> Mais esperto que o diabo</h5>
            <p class="card-text">Junior Rostirola</p>
          </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/Biblioteca-da-meia-noite.jpg" class="card-img-top" alt="Livro -  A biblioteca da meia-noite ">
          <div class="card-body">
            <h5 class="card-title"> A biblioteca da meia-noite </h5>
            <p class="card-text"> Matt Haig</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex flex-wrap justify-content-around">
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/O-poder-da-autorresponsabilidade.jpg" class="card-img-top" alt="Livro -  O poder da autorresponsabilidade">
          <div class="card-body">
            <h5 class="card-title"> O poder da autorresponsabilidade</h5>
            <p class="card-text">Junior  Paulo Vieira</p>
          </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/Tudo-e-rio.jpg" class="card-img-top" alt="Livro - Tudo é rio">
          <div class="card-body">
            <h5 class="card-title">Tudo é rio</h5>
            <p class="card-text">Carla Madeira</p>
          </div>
        </div>
        <div class="card m-2" style="width: 18rem;">
          <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/12/Minutos-de-sabedoria.jpg" class="card-img-top" alt="Livro - Minutos de sabedoria">
          <div class="card-body">
            <h5 class="card-title"> Minutos de sabedoria</h5>
            <p class="card-text">C. Torres Pastorino</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div></div><br><br>



<h4> Venha participar conosco</h4>




</body>
</html>