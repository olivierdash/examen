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
$router->group('', function (Router $router) use ($app) {

    // GET home page - affichage du formulaire d'ajout
    $router->get('/', function () use ($app) {
        // On combine toutes les variables dans un seul appel render
        $app->render('obj/add', [
            'title'     => 'Ajouter un objet',
            'BASE_URL'  => BASE_URL,
            'csp_nonce' => Flight::get('csp_nonce') // Transmet le nonce pour le CSS/JS
        ]);
    });

}, [SecurityHeadersMiddleware::class]);