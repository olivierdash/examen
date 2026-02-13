<?php
// routes.php
use app\middlewares\SecurityHeadersMiddleware;
use app\models\Categorie;
use flight\Engine;
use flight\net\Router;
use app\Controllers\ObjetController;
use app\models\User;
use app\models\Echanges;
use app\models\Objet;
/** 
 * @var Router $router 
 * @var Engine $app
 */

// Wrap all routes with SecurityHeadersMiddleware
$router->group('', function (Router $router) use ($app) {

    $router->get('/', function () use ($app) {
        $app->render('login');
    });
    
    $router->group('/user', function () use ($router, $app) {
        $router->get('/connect', function() use ($app){
            $app->render('connect');
        });
        $router->post('/connect', [User::class, 'tryConnect']);
        $router->post('/create', [User::class, 'insert']);
        $router->get('/user/profile', function () use ($app) {
            $app->render('user/profile');
        });

        $router->get('/users/list', function () use ($app) {
            $userModel = new User();
            $users = $userModel->getAll(); // Récupère tous les utilisateurs
            $app->render('users/list/list', ['users' => $users]);
        });
    });


    $router->get('/stats', function () use ($app) {
        $userModel = new User();
        $userCount = $userModel->countUser(); // Récupère le nombre total d'utilisateurs
        $exchangeModel = new Echanges();
        $exchangeCount = $exchangeModel->countEchanges(); // Récupère le nombre total d'échanges
        $app->render('statistiques/stats', ['userCount' => $userCount, 'exchangeCount' => $exchangeCount]);
    });

    $router->group('/obj', function () use ($router, $app) {
        $router->get('/obj/form', function () use ($app) {
            // On combine toutes les variables dans un seul appel render
            $app->render('obj/add', ['categories' => Categorie::getAll()]);
        });

        $router->get('/obj/add', function () use ($app) {
            // On combine toutes les variables dans un seul appel render
            $idProprietaire = $_SESSION['user_id'] ?? null; // Récupère l'ID de l'utilisateur connecté depuis la session
            ObjetController::create($idProprietaire);
            $app->render('obj/add', ['categories' => Categorie::getAll()]);
        });
    });

    $router->group('/admin', function () use ($router, $app) {
        $router->get('/insert', function () use ($app){
            $app->render('admin/obj/add', ['categories' => Categorie::getAll()]);
            return;
        });
        $router->get('/modif/@id', function () use ($app){
            $app->render('admin/obj/add', ['categories' => Categorie::getAll()]);
            return;
        });
        $router->get('/deconnexion', function () use ($app) {
            $app->render('login');
        });
        $router->get('/@id', function ($id) use ($app) {
            $app->render('admin/home', ['p' => $id]);
        });
    });
    // GET home page - affichage du formulaire d'ajout

}, [SecurityHeadersMiddleware::class]);