<?php
include(__DIR__ . '/../inc/function.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
<script src="/assets/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
<header>
<nav class="navbar navbar-expand-lg bg-primary shadow-sm">
<div class="container-fluid">
<a class="navbar-brand text-white fw-bold">Takalo takalo</a>
<form class="d-flex ms-auto me-3 column-gap-3" method="post" action="/user/filtered_objet" role="search">
<input class="form-control" type="search" placeholder="Search" aria-label="Search">

            <!-- Example single danger button -->
         
            <select class="form-select" aria-label="Default select example" name="categ">
  <option value="" selected>Tous</option>
  <?php foreach ($categories as $categ) { ?>
    <option value="<?= e($categ['ID']) ?>"><?= e($categ['Nom']) ?></option>
    <?php } ?>
</select>
<button class="btn btn-warning text-dark fw-semibold" type="submit">Search</button>
</form>
<div class="rounded-circle bg-light" style="width: 50px; heigth: 50px;">
<a href="/user/profile" class="rounded-circle overflow-hidden d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
</a>
</div>
</div>
</nav>
</header>
<main class="container-fluid mt-5">
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
<?php foreach($objets as $o){ ?>
<div class="col">
<div class="card h-100 border-0 shadow-sm">
<img src="/assets/images/1.jpg" class="card-img-top object-fit-cover" alt="..." style="height: 200px; object-fit: cover;">
<div class="card-body">
<h5 class="card-title text-primary"><?= e($o['Titre'] ?? "test") ?></h5>
<p class="card-text text-muted"><?= e($o['Description'] ?? "234") ?></p>
</div>
<div class="card-body border-top pt-3">
<div class="d-flex justify-content-between align-items-center mb-3">
<span class="h5 mb-0 text-warning fw-bold"><?= e($o['Prix'] ?? "0") ?> €</span>
</div>
<a href="/obj/fiche/<?= e($o['ID']) ?>" class="btn btn-primary btn-sm w-100" role="button">Voir plus</a>
</div>
</div>
</div>
<?php } ?>
</div>
</main>
</body>
</html>