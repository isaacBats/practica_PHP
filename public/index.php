<?php 
use Illuminate\Http\Request;
use PlatziPHP\Http\Controllers\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';

// echo 'Hello word!!!';

$container = new \Illuminate\Container\Container();
$router = new \Illuminate\Routing\Router(
	new \Illuminate\Events\Dispatcher($container),
	$container
);

$router->get('/', HomeController::class, '@index');
$response = $router->dispatch(Request::capture();)
$response->send();

//$request = Request::capture();

//$controller = $container->make(HomeController::class);
//$controller = new HomeController(new PlatziPHP\FakeDatabase());

// echo $controller->index($request);
//$controller->index($request);