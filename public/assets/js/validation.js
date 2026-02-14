document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.signup-form');
    if (!form) return; // Sécurité si on est sur la page de connexion

    const emailInput = form.querySelector('input[type="email"]');
    const passwordInput = form.querySelector('input[type="password"]');
    const submitBtn = form.querySelector('.auth-btn');

    // Fonction de validation
    const validate = () => {
        const emailValue = emailInput.value.trim();
        const passwordValue = passwordInput.value.trim();
        
        // Regex pour l'email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const isEmailValid = emailRegex.test(emailValue);
        
        // Longueur mot de passe
        const isPasswordValid = passwordValue.length >= 8;

        // Feedback visuel Email
        if (emailValue !== "") {
            emailInput.style.borderColor = isEmailValid ? "#10b981" : "#ef4444";
        }

        // Feedback visuel Mot de passe
        if (passwordValue !== "") {
            passwordInput.style.borderColor = isPasswordValid ? "#10b981" : "#ef4444";
        }

        // Activation du bouton
        submitBtn.disabled = !(isEmailValid && isPasswordValid);
        submitBtn.style.opacity = submitBtn.disabled ? "0.5" : "1";
        submitBtn.style.cursor = submitBtn.disabled ? "not-allowed" : "pointer";
    };

    // Écouteurs d'événements pour la validation en temps réel
    emailInput.addEventListener('input', validate);
    passwordInput.addEventListener('input', validate);

    // Empêcher l'envoi si non valide (sécurité supplémentaire)
    form.addEventListener('submit', (e) => {
        if (submitBtn.disabled) {
            e.preventDefault();
            alert("Veuillez remplir correctement les champs.");
        }
    });
});