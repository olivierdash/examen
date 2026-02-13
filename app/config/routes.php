<?php
// routes.php
use app\middlewares\SecurityHeadersMiddleware;
use app\models\Categorie;
use flight\Engine;
use flight\net\Router;
use app\Controllers\ObjetController;
use app\Models\User;
/** 
 * @var Router $router 
 * @var Engine $app
 */

// Wrap all routes with SecurityHeadersMiddleware
$router->group('', function (Router $router) use ($app) {

    $router->get('/stats', function () use ($app) {
        $userModel = new User();
        $userCount = $userModel->countUser(); // Récupère le nombre total d'utilisateurs
        $app->render('statistiques/stats', ['userCount' => $userCount]);
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
    // GET home page - affichage du formulaire d'ajout

}, [SecurityHeadersMiddleware::class]);