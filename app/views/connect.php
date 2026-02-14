<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc&Co - Connexion</title>
    <link rel="stylesheet" nonce="<?= Flight::get('csp_nonce') ?>" href="/assets/css/style.css">
</head>

<body class="auth-page">
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Bon retour !</h2>
                <p class="auth-subtitle">Connectez-vous à votre espace Troc</p>
            </div>

            <form method="POST" action="/user/connect" class="auth-form">
                <div class="input-group">
                    <label class="auth-label">Nom d'utilisateur</label>
                    <input type="text" class="auth-input" name="nom" placeholder="Ex: JeanDupont" required>
                </div>

                <div class="input-group">
                    <label class="auth-label">Mot de passe</label>
                    <input type="password" class="auth-input" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="auth-btn">Se connecter</button>
            </form>

            <div class="auth-footer">
                <span>Pas encore de compte ?</span>
                <a href="/" class="auth-link">Créer un compte</a>
            </div>
        </div>
    </div>

    <script nonce="<?= Flight::get('csp_nonce') ?>" src="/assets/js/script.js"></script>
    <script nonce="<?= Flight::get('csp_nonce') ?>" src="/assets/js/validation.js"></script>
</body>

</html>