<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Troc&Co' ?> | Marketplace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="site-layout">
    <header class="main-header">
        <nav class="navbar-custom container">
            <a class="brand" href="/accueil">TROC<span>&</span>CO</a>

            <div class="nav-controls">
                <?php if (isset($title) && $title === 'Accueil'): ?>
                    <form class="search-bar-container" method="POST" action="/obj/filtered_objet">
                        <div class="search-input-group">
                            <i class="bi bi-search"></i>
                            <input type="search" placeholder="Chercher un objet..." name="query">
                        </div>
                        <button type="submit" class="btn-search-external">Rechercher</button>
                    </form>
                <?php endif; ?>

                <ul class="nav-links">
                    <li><a href="/accueil" class="<?= $title === 'Accueil' ? 'active' : '' ?>">Explorer</a></li>
                    <li><a href="/obj/form">Vendre</a></li>
                    <li>
                        <a href="/user/profil/<?= $_SESSION['user_id'] ?? ''; ?>" class="profile-link">
                            <i class="bi bi-person-circle"></i> Profil
                        </a>
                    </li>
                    <li><a href="/logout" class="btn-logout-alt">Quitter</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="main-content">
        <?= $content ?>
    </main>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-divider"></div>
            <p>&copy; 2026 <span>Troc&Co</span> - Échangez malin.</p>
        </div>
    </footer>
    <script nonce="<?= Flight::get('csp_nonce') ?>" src="/assets/js/addFormObj.js"></script>
</body>

</html>