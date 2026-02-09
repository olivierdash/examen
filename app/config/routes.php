<?php
// routes.php
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// Wrap all routes with SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {
    
    // GET home page - display all products
    $router->get('/', function() use ($app) {
        $app->render('obj/add', ['title' => 'Accueil']);
    });

    // POST insert/update product
}, [SecurityHeadersMiddleware::class]);