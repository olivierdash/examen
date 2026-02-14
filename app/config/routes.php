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
use app\models\Objet;
use app\controllers\CategorieController;
/** 
 * @var Router $router 
 * @var Engine $app
 */

// Wrap all routes with SecurityHeadersMiddleware
// routes.php

$router->group('', function (Router $router) use ($app) {

    // --- SIGN-IN (Page d'inscription / Racine) ---
    $router->get('/', function () use ($app) {
        // Souvent pour le login/inscription, on ne veut pas la navbar standard.
        // Si tu veux quand même le style pro sans navbar, tu peux créer un 'modele_simple.php'
        // ou simplement charger la vue directement comme ceci :
        $app->render('login');
    });

    // --- LOGOUT (Déconnexion) ---
    $router->get('/logout', function () use ($app) {
        session_destroy();
        Flight::redirect('/');
    });

    // --- PAGE ACCUEIL ---
    $router->get('/accueil', function () use ($app) {
        $objets = ObjetController::getAll();
        $categories = CategorieController::getAll();

        // 1. On stocke la vue spécifique dans la variable 'content'
        $app->render('home', ['objets' => $objets, 'categories' => $categories], 'content');
        // 2. On affiche le modèle qui contient l'ossature (navbar/footer)
        $app->render('modele', ['title' => 'Accueil']);
    });

    $router->group('/user', function () use ($router, $app) {
        $router->post('/connect', [User::class, 'tryConnect']);
        $router->get('/connect', function () use ($app) {
            $app->render('connect');
        });


        // Formulaire de connexion (souvent sans navbar/footer, mais voici comment l'inclure si besoin)
        // $router->get('/connect', function () use ($app) {
        //     $app->render('connect', [], 'content');
        //     $app->render('modele', ['title' => 'Connexion']);
        // });

        // Profil détaillé
        $router->get('/profil/@id', function ($id) use ($app) {
            $user = UserController::getById($id);
            $objets = ObjetController::getByUser($id);

            $app->render('users/profil/profil', ['user' => $user, 'objets' => $objets], 'content');
            $app->render('modele', ['title' => 'Profil de ' . $user['Nom']]);
        });

        // Liste des utilisateurs
        $router->get('/list', function () use ($app) {
            $userModel = new User();
            $users = $userModel->getAll();

            $app->render('user/list', ['users' => $users], 'content');
            $app->render('modele', ['title' => 'Liste des utilisateurs']);
        });
    });

    // --- STATISTIQUES ---
    $router->get('/stats', function () use ($app) {
        $userCount = (new User())->countUser();
        $exchangeCount = (new Echanges())->countEchanges();

        $app->render('statistiques/stats', ['userCount' => $userCount, 'exchangeCount' => $exchangeCount], 'content');
        $app->render('modele', ['title' => 'Statistiques Globales']);
    });

    $router->group('/obj', function () use ($router, $app) {
        // Formulaire d'ajout
        $router->get('/form', function () use ($app) {
            $app->render('obj/add', ['categories' => Categorie::getAll()], 'content');
            $app->render('modele', ['title' => 'Ajouter un objet']);
        });

        $router->post('/add', function () use ($app) {
            // On combine toutes les variables dans un seul appel render
            $idProprietaire = $_SESSION['user_id'] ?? null; // Récupère l'ID de l'utilisateur connecté depuis la session
            ObjetController::create($_POST['name'], $_POST['desc'], $_POST['prix'], $idProprietaire, $_POST['categorie']);
            $app->render('obj/add', ['categories' => Categorie::getAll()], 'content');
            $app->render('modele', ['title' => 'Ajouter un objet']);
        });
        // Fiche d'un objet
        $router->get('/fiche/@id', function ($id) use ($app) {
            $myObjects = ObjetController::getByUser($_SESSION['user_id'] ?? null);
            $objet = ObjetController::getById($id);
            $categorie = CategorieController::getById($objet['IdCategorie']);

            $app->render('obj/fiche', [
                'objet' => $objet,
                'myObjects' => $myObjects,
                'categorie' => $categorie
            ], 'content');

            $app->render('modele', ['title' => $objet['Titre']]);
        });
    });

    // --- ADMIN ---
    $router->group('/admin', function () use ($router, $app) {
        $router->get('/@id', function ($id) use ($app) {
            // Ici on peut passer 'p' pour charger dynamiquement le contenu dans l'admin
            $app->render('admin/home', ['p' => $id], 'content');
            $app->render('modele', ['title' => 'Administration']);
        });
    });

}, [SecurityHeadersMiddleware::class]);