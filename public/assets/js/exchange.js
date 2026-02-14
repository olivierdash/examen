document.addEventListener('DOMContentLoaded', () => {
    const boutonProposition = document.getElementById('proposition');
    const exchangeContainer = document.getElementById('exchange-area');

    if (boutonProposition && exchangeContainer) {
        boutonProposition.addEventListener('click', () => {
            const existingContainer = document.getElementById('exchange-selector-container');
            if (existingContainer) {
                existingContainer.remove();
                return;
            }

            const dataElement = document.getElementById('my-objects-data');
            const mesObjets = dataElement ? JSON.parse(dataElement.textContent) : [];

            if (mesObjets.length === 0) {
                alert("Vous n'avez pas d'objets à proposer.");
                return;
            }

            const wrapper = document.createElement('div');
            wrapper.id = 'exchange-selector-container';
            wrapper.className = 'select-exchange-animate';

            const list = document.createElement('div');
            list.className = 'exchange-checkbox-list';

            mesObjets.forEach(objet => {
                const label = document.createElement('label');
                label.className = 'exchange-item';
                label.innerHTML = `
                    <input type="checkbox" value="${objet.ID}">
                    <div class="item-content">
                        <span class="item-name">${objet.Titre}</span>
                        <i class="bi bi-circle"></i>
                    </div>
                `;
                list.appendChild(label);
            });

            const validBtn = document.createElement('button');
            validBtn.id = 'btn-confirm-exchange';
            validBtn.className = 'auth-btn success-btn';
            validBtn.style.display = 'none';
            validBtn.innerHTML = 'Confirmer l\'échange';
            
            wrapper.appendChild(list);
            wrapper.appendChild(validBtn);
            exchangeContainer.appendChild(wrapper);

            list.addEventListener('change', () => {
                const checked = list.querySelectorAll('input:checked').length;
                validBtn.style.display = checked > 0 ? 'block' : 'none';
            });

            // --- NOUVELLE LOGIQUE DE VALIDATION ---
            validBtn.addEventListener('click', function() {
                // 1. Désactiver le bouton pour éviter les doubles clics
                this.disabled = true;

                // 2. Lancer l'animation de validation (le V)
                this.innerHTML = '<i class="bi bi-check-lg check-v-anim"></i> Envoyé !';
                this.classList.add('btn-validated');

                // 3. Attendre la fin de l'animation pour fermer la liste
                setTimeout(() => {
                    // Animation de sortie pour le wrapper
                    wrapper.style.opacity = '0';
                    wrapper.style.transform = 'scale(0.95)';
                    wrapper.style.transition = 'all 0.4s ease';

                    setTimeout(() => {
                        wrapper.remove();
                        // Optionnel : Changer le texte du bouton principal
                        boutonProposition.innerHTML = '<i class="bi bi-check-all"></i> Proposition envoyée';
                        boutonProposition.style.background = '#10b981';
                    }, 400);
                }, 1200); // On laisse le "V" visible 1.2 seconde
            });
        });
    }
});