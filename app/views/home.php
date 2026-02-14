<?php
include(__DIR__ . '/../inc/function.php');
?>
<section class="home-hero">
    <div class="container">
        <h2 class="home-title">Objets disponibles</h2>
        <p class="home-subtitle">Découvrez les pépites à échanger près de chez vous.</p>
    </div>
</section>

<main class="container">
    <div class="objects-grid">
        <?php foreach ($objets as $o) { ?>
            <div class="object-card">
                <div class="card-image">
                    <img src="/assets/images/1.jpg" alt="<?= e($o['Titre'] ?? "Objet") ?>">
                    <div class="card-badge">Excellent état</div>
                </div>
                
                <div class="card-content">
                    <h3 class="object-title"><?= e($o['Titre'] ?? "Sans titre") ?></h3>
                    
                    <div class="card-info">
                        <span class="object-price"><?= e($o['Prix'] ?? "0") ?> €</span>
                    </div>

                    <a href="/obj/fiche/<?= e($o['ID']) ?>" class="btn-detail">
                        Voir les détails
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>