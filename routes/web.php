<?php

use Illuminate\Support\Facades\Route;

$router->get('/', 'Home@index');
$router->post('/login-submit', 'Login@login');

$router->group(['middleware' => 'api'], function () use ($router) {
    $router->get('/livros', 'Controller@ApresentacaoLivros');
    $router->get('/livros/{id}', 'Livros@Detalhes');
    $router->post('/livros', 'Livros@AdicionarLivro');
    $router->post('/livros/{id}', 'Livros@EncaminharEmprestimo');
    $router->get('/livros/{id}/edit', 'Livros@EncaminharEdicao');
    $router->put('/livros/{id}', 'Livros@EditarLivro');
    $router->delete('/livros/{id}', 'Livros@ExcluirLivro');

    $router->post('/usuarios', 'Usuarios@AdicionarUser');
    $router->get('/usuarios', 'Usuarios@ApresentacaoUsuarios');
    $router->put('/usuarios/{id}', 'Usuarios@EditarUsuario');
    $router->delete('/usuarios/{id}', 'Usuarios@ExcluirUsuario');

    // Exemplo de rota protegida
    $router->get('/api/recurso-protegido', function () {
        // Lógica do controlador ou retorno da rota protegida
    });
});










