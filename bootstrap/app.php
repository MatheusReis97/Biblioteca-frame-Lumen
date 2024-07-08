<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.

| Aqui iremos carregar o ambiente e criar a instância da aplicação
| que serve como peça central desta estrutura. Usaremos isso
| aplicação como um contêiner e roteador "IoC" para esta estrutura.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

 $app->withFacades();

 $app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.

|Agora registraremos algumas ligações no contêiner de serviço. Vamos
| registre o manipulador de exceções e o kernel do console. Você pode adicionar
| suas próprias ligações aqui, se desejar, ou você pode criar outro arquivo.

*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Config Files
|--------------------------------------------------------------------------
|
| Now we will register the "app" configuration file. If the file exists in
| your configuration directory it will be loaded; otherwise, we'll load
| the default version. You may register other files below as needed.
|
| Agora vamos cadastrar o arquivo de configuração do “app”. Se o arquivo existir em
| seu diretório de configuração será carregado; caso contrário, carregaremos
| a versão padrão. Você pode registrar outros arquivos abaixo conforme necessário.
*/

$app->configure('app');

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.

| A seguir, registraremos o middleware na aplicação. Estes podem
| ser um middleware global executado antes e depois de cada solicitação em um
| rota ou middleware que será atribuído a algumas rotas específicas.
|
*/
$app->middleware([
    // ...
    \Illuminate\Session\Middleware\StartSession::class,
    // ...
]);


$app->middleware([
    App\Http\Middleware\ExampleMiddleware::class
]);

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.

| Aqui iremos cadastrar todos os prestadores de serviços do aplicativo que
| são usados ​​para vincular serviços ao contêiner. Os prestadores de serviços são
| totalmente opcional, portanto você não é obrigado a descomentar esta linha.
|
|
*/
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);

$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.

| A seguir incluiremos o arquivo de rotas para que todas possam ser adicionadas ao
| a aplicação. Isso fornecerá todos os URLs que o aplicativo
| podem responder, bem como os controladores que podem lidar com eles.
|
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
