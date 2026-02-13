<?php
include('pages.php');
include(__DIR__ . '/../../inc/function.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <div class="d-flex">
        <nav id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-white border-end vh-100 position-fixed" style="width: 280px;">

            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <span class="fs-4 fw-bold">ADMIN</span>
            </a>

            <hr class="my-3">

            <ul class="nav nav-pills flex-column mb-auto">
                <?php
                foreach ($menu as $slug => $data) {
                    $isActive = ($p === $slug) ? 'active shadow-sm' : 'link-dark';
                ?>
                    <li class='nav-item mb-1'>
                        <a href='/admin/<?= $slug; ?>' class='nav-link <?= $isActive ?>'>
                            <i class='bi bi-<?= $data['icon'] ?> me-2'></i>
                            <?= e($data['label']); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>

            <hr>

            <div class="">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li><a class="text-danger p-4" href="/admin/deconnexion">Déconnexion</a></li>
                </ul>

            </div>
        </nav>

        <main class="w-100" style="margin-left: 280px;">
            <div class="container-fluid  min-vh-100 p-2z">
                <?php
                $page = $p;
                $allowed = ['category', 'stats'];
                include($page . ".php");
                // if (in_array($page, $allowed)) {
                //     $filePath = "./" .$page . ".php";
                //     if (file_exists($filePath)) {
                        
                //     } else {
                //         echo "<div class='alert alert-danger border-0 shadow-sm'>Fichier <strong>$page.php</strong> introuvable dans le dossier /pages/.</div>";
                //     }
                // } else {
                //     echo "<div class='alert alert-warning border-0 shadow-sm'>Page non autorisée.</div>";
                // }
                ?>
            </div>
        </main>
    </div>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>