<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouvel objet | Vitrine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-primary">Vendre un objet</h1>
                <p class="text-muted">Remplissez les détails ci-dessous pour mettre votre objet en ligne.</p>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form action="traitement.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="mb-4">
                            <label for="titre" class="form-label">Titre de l'annonce</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Ex: Appareil photo Canon EOS" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Description détaillée</label>
                            <textarea class="form-control" id="description" name="description" rows="5" style="border-left: 1px solid #dee2e6;" placeholder="Décrivez l'état, les fonctionnalités, etc."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="prix" class="form-label">Prix de vente</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-euro-sign"></i></span>
                                    <input type="number" step="0.01" class="form-control" id="prix" name="prix" placeholder="0.00" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="categorie" class="form-label">Catégorie</label>
                                <select class="form-select" id="categorie" name="categorie">
                                    <option selected disabled>Choisir...</option>
                                    <option value="electronique">Électronique</option>
                                    <option value="maison">Maison</option>
                                    <option value="loisirs">Loisirs</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Photos de l'objet</label>
                            <div class="upload-area" onclick="document.getElementById('photos').click()">
                                <i class="fa-solid fa-cloud-arrow-up fa-3x text-primary mb-3"></i>
                                <h5>Cliquez ou glissez vos photos ici</h5>
                                <p class="small text-muted">Format JPG ou PNG (Max. 5 Mo par photo)</p>
                                <input type="file" class="d-none" id="photos" name="photos[]" multiple accept="image/*">
                            </div>
                            <div id="preview" class="row mt-3"></div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                <i class="fa-solid fa-paper-plane me-2"></i> Publier l'annonce
                            </button>
                            <a href="index.php" class="btn btn-link text-muted">Annuler et retourner à l'accueil</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>