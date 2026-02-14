document.addEventListener('DOMContentLoaded', () => {
    const card = document.querySelector('.auth-card');
    const inputs = document.querySelectorAll('.auth-input'); // Plus précis
    const form = document.querySelector('form');
    const btn = document.querySelector('.auth-btn');

    // 1. Apparition fluide de la carte (Vérification si elle existe)
    if (card) {
        setTimeout(() => {
            card.classList.add('visible');
        }, 150);
    }

    // 2. Animation sur les inputs
    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            // On anime le parent direct (input-group)
            if (input.parentElement) {
                input.parentElement.style.transform = 'translateX(8px)';
                input.parentElement.style.transition = 'all 0.3s ease';
            }
        });

        input.addEventListener('blur', () => {
            if (input.parentElement) {
                input.parentElement.style.transform = 'translateX(0)';
            }
        });
    });

    // 3. Feedback visuel sur le bouton
    if (form && btn) {
        form.addEventListener('submit', () => {
            if(form.checkValidity()) {
                btn.innerText = "Chargement...";
                btn.style.opacity = "0.7";
                btn.style.pointerEvents = "none";
            }
        });
    }
});