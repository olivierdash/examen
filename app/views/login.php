<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc&Co - Inscription</title>
    <link rel="stylesheet" nonce="<?= Flight::get('csp_nonce') ?>" href="/assets/css/style.css">
</head>

<body>
    <div class="login-container">
        <div class="login-image-side">
            <div class="login-overlay">
                <h1>Rejoignez Troc&Co</h1>
                <p>Échangez ce que vous avez contre ce dont vous avez besoin.</p>
            </div>
        </div>

        <div class="login-form-side">
            <div class="auth-card">
                <form method="POST" action="/user/create" class="signup-form">
                    <h2 class="auth-title">Créer un compte</h2>
                    <p class="auth-subtitle">C'est gratuit et ça le restera toujours.</p>

                    <div class="input-group">
                        <label class="auth-label">Email*</label>
                        <input type="email" name="email" class="auth-input" placeholder="votre@email.com" required>
                    </div>

                    <div class="input-group">
                        <label class="auth-label">Nom d'utilisateur*</label>
                        <input type="text" name="nom" class="auth-input" placeholder="Ex: JeanD" required>
                    </div>

                    <div class="input-group">
                        <label class="auth-label">Mot de passe*</label>
                        <input type="password" name="password" class="auth-input" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="auth-btn">Créer mon compte</button>
                </form>

                <div class="auth-footer">
                    <span>Vous avez déjà un compte ?</span>
                    <a href="/user/connect" class="auth-link">Se connecter</a>
                </div>
            </div>
        </div>
    </div>

    <script nonce="<?= Flight::get('csp_nonce') ?>" src="/assets/js/script.js"></script>
    <script nonce="<?= Flight::get('csp_nonce') ?>" src="/assets/js/validation.js"></script>

</body>

</html>