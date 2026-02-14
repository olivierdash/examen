<main class="container form-page">
    <div class="form-card-wrapper wide"> 
        <div class="auth-card visible">
            <div class="auth-header">
                <h1 class="auth-title">Ajouter un nouvel objet</h1>
                <p class="auth-subtitle">Remplissez les détails ci-dessous pour publier votre annonce.</p>
            </div>

            <form action="/obj/add" method="post" enctype="multipart/form-data" class="modern-form">
                <div class="form-grid-top">
                    <div class="input-group">
                        <label class="auth-label">Nom de l'objet</label>
                        <input type="text" class="auth-input" name="name" placeholder="Ex: PlayStation 5 Edition Standard" required>
                    </div>
                    
                    <div class="input-group">
                        <label class="auth-label">Catégorie</label>
                        <div class="select-wrapper">
                            <select name="categorie" class="auth-input">
                                <?php foreach ($categories as $key) { ?>
                                    <option value="<?php echo $key['ID']; ?>"><?php echo $key['Nom']; ?></option>
                                <?php } ?>
                            </select>
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="auth-label">Prix (€)</label>
                        <input type="number" step="0.01" class="auth-input" name="prix" placeholder="0.00" required>
                    </div>
                </div>
                
                <div class="input-group">
                    <label class="auth-label">Description</label>
                    <textarea class="auth-input" name="desc" rows="4" placeholder="Décrivez l'état de l'objet..." required></textarea>
                </div>

                <div class="input-group">
                    <label class="auth-label">Images de l'objet</label>
                    <div class="file-drop-area">
                        <i class="bi bi-cloud-arrow-up"></i>
                        <span class="file-msg">Cliquez ou glissez vos photos ici</span>
                        <input type="file" class="file-input" name="img[]" accept="image/*" multiple required>
                    </div>
                    <p class="input-hint">Plusieurs photos autorisées.</p>
                </div>

                <button type="submit" class="auth-btn">Publier l'annonce</button>
            </form>
        </div>
    </div>
</main>