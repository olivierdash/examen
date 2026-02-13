<?php
// routes.php
use app\controllers\UserController;
use app\middlewares\SecurityHeadersMiddleware;
use app\models\Categorie;
use flight\Engine;
use flight\net\Router;
use app\controllers\ObjetController;
use app\models\User;
use app\models\Echanges;
/** 
 * @var Router $router 
 * @var Engine $app
 */

// Wrap all routes with SecurityHeadersMiddleware
$router->group('', function (Router $router) use ($app) {

    $router->get('/', function () use ($app) {
        $app->render('home');
    });

    $router->group('/user', function () use ($router, $app) {
        $router->get('/login', function () use ($app) {
            $app->render('user/login');
        });

        $router->get('/register', function () use ($app) {
            $app->render('user/register');
        });

        $router->get('/profil/@id', function ($id) use ($app) {
            $user = UserController::getById($id);
            $idProprietaire = $id;
            $objets = ObjetController::getByUser($idProprietaire);
            $app->render('users/profil/profil', ['user' => $user, 'objets' => $objets]);
        });

        $router->get('/list', function () use ($app) {
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
        $router->get('/form', function () use ($app) {
            // On combine toutes les variables dans un seul appel render
            $app->render('obj/add/add', ['categories' => Categorie::getAll()]);
        });

        $router->post('/add', function () use ($app) {
            // On combine toutes les variables dans un seul appel render
            $idProprietaire = $_SESSION['user_id'] ?? null; // Récupère l'ID de l'utilisateur connecté depuis la session
            ObjetController::create($_POST['nom'], $_POST['description'], $_POST['prix'], $idProprietaire, $_POST['idCategorie']);
            $app->render('obj/add/add', ['categories' => Categorie::getAll()]);
        });

        $router->get('/fiche/@id', function ($id) use ($app) {
            $objet = ObjetController::getById($id);
            $app->render('obj/fiche/fiche', ['objet' => $objet]);
        });
    });
    // GET home page - affichage du formulaire d'ajout

}, [SecurityHeadersMiddleware::class]);