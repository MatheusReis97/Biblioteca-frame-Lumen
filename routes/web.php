<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\Livros;



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'Home@index');


$router->post('/login-submit', 'Login@forms');


$router->get('livros', 'Controller@ApresentacaoLivros');


$router->get('livros/{id}','Livros@Detalhes');



$router->post('livros', 'Livros@AdicionarLivro');
$router->post('livros/{id}', 'Livros@EncaminharEmprestimo');
$router->get('livros/{id}/edit', 'Livros@EncaminharEdicao');
$router->put('livros/{id}','Livros@EditarLivro');
$router->delete('livros/{id}','Livros@ExcluirLivro');




$router->post('usuarios','Usuarios@AdicionarUser');
$router->get('usuarios','Usuarios@ApresentacaoUsuarios');
$router->put('usuarios/{id}', 'Usuarios@EditarUsuario');
$router->delete('usuarios/{id}','Usuarios@ExcluirUsuario');








