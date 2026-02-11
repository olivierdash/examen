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

    $router->group('/obj', function () use ($router, $app) {
        $router->get('/obj/form', function () use ($app) {
            // On combine toutes les variables dans un seul appel render
            $app->render('obj/add', ['categories' => Categorie::getAll()]);
        });

        $router->get('/obj/add', function () use ($app) {
            // On combine toutes les variables dans un seul appel render
            $app->render('obj/add', ['categories' => Categorie::getAll()]);
        });
    });
    // GET home page - affichage du formulaire d'ajout

}, [SecurityHeadersMiddleware::class]);