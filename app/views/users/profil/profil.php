<main class="container profil-page">
    <section class="profil-header">
        <div class="profil-avatar">
            <i class="bi bi-person-circle"></i>
        </div>
        <div class="profil-info">
            <h1><?php echo $user['Nom']; ?></h1>
            <p class="profil-email"><i class="bi bi-envelope"></i> <?php echo $user['email']; ?></p>
            <div class="profil-stats">
                <span class="badge-stat"><strong><?php echo count($objets); ?></strong> Objets</span>
            </div>
        </div>
        <div class="profil-actions">
            <a href="/obj/form" class="btn-primary-small"><i class="bi bi-plus-lg"></i> Ajouter un objet</a>
        </div>
    </section>

    <section class="profil-objects">
        <div class="section-title-group">
            <h2 class="section-title">Mes Objets possédés</h2>
            <div class="title-underline"></div>
        </div>

        <?php if(isset($objets) && !empty($objets)): ?>
            <div class="objects-grid">
                <?php foreach ($objets as $objet): ?>
                    <article class="object-card">
                        <div class="card-image-placeholder">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="object-title"><?php echo $objet['Titre']; ?></h3>
                            <p class="object-description"><?php echo $objet['Description']; ?></p>
                            <div class="card-footer">
                                <a href="/obj/fiche/<?php echo $objet['ID']; ?>" class="btn-text">Gérer l'objet <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="bi bi-emoji-neutral"></i>
                <p>Vous n'avez pas encore d'objets à échanger.</p>
                <a href="/obj/form" class="auth-link">Commencer maintenant</a>
            </div>
        <?php endif; ?>
    </section>
</main>