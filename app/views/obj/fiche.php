<main class="container product-page">
    <div class="retour-link">
        <a href="/accueil"><i class="bi bi-arrow-left"></i> Retour à la liste des objets</a>
    </div>

    <div class="product-layout">
        <section class="product-main">
            <div class="product-card">
                <div class="product-header">
                    <span class="category-badge"><?php echo $categorie['Nom']; ?></span>
                    <h1 class="product-title"><?php echo $objet['Titre']; ?></h1>
                </div>

                <div class="product-gallery">
                    <img src="/assets/images/1.jpg" alt="<?= $objet['Titre'] ?>" class="main-image">
                </div>

                <div class="product-details">
                    <h3>Description</h3>
                    <p class="description"><?php echo $objet['Description']; ?></p>
                </div>
            </div>
        </section>

        <aside class="product-sidebar">
            <div class="action-card">
                <div class="price-section">
                    <span class="label">Valeur estimée</span>
                    <p class="price"><?php echo $objet['Prix']; ?> €</p>
                </div>

                <div class="divider"></div>

                <div id="exchange-area" class="exchange-container">
                    <button id="proposition" class="auth-btn">
                        <i class="bi bi-arrow-left-right"></i> Proposer un échange
                    </button>
                    </div>
                
                <p class="security-note">
                    <i class="bi bi-shield-check"></i> Échange sécurisé par Troc&Co
                </p>
            </div>
        </aside>
    </div>
</main>

<script id="my-objects-data" type="application/json">
    <?php echo json_encode($myObjects); ?>
</script>
<script src="/assets/js/exchange.js"></script>