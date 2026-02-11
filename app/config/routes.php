<?php
// routes.php
use app\middlewares\SecurityHeadersMiddleware;
use app\models\Categorie;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// Wrap all routes with SecurityHeadersMiddleware
$router->group('', function (Router $router) use ($app) {

    // GET home page - affichage du formulaire d'ajout
    $router->get('/', function () use ($app) {
        // On combine toutes les variables dans un seul appel render
        $app->render('obj/add', ['categories' => Categorie::getAll()]);
    });

    $router->get('/debug-php', function () {
        phpinfo();
    });

}, [SecurityHeadersMiddleware::class]);