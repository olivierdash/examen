document.addEventListener('DOMContentLoaded', () => {
    const boutonProposition = document.getElementById('proposition');
    const exchangeContainer = document.getElementById('exchange-area');

    if (boutonProposition) {
        boutonProposition.addEventListener('click', () => {
            // 1. Nettoyage si déjà ouvert
            let selectExistant = document.getElementById('select-existant');
            if (selectExistant) {
                selectExistant.remove();
                return;
            }

            // 2. Récupération des données depuis le script JSON du HTML
            const dataElement = document.getElementById('my-objects-data');
            const mesObjets = JSON.parse(dataElement.textContent);

            if (mesObjets.length === 0) {
                alert("Vous n'avez pas d'objets à proposer en échange.");
                return;
            }

            // 3. Création du Select décoré
            let select = document.createElement('select');
            select.id = 'select-existant';
            select.multiple = true;
            select.className = 'auth-input'; // On réutilise nos classes de formulaires
            select.title = "Maintenez Ctrl pour en choisir plusieurs";

            mesObjets.forEach(objet => {
                let option = document.createElement('option');
                option.value = objet.ID;
                option.textContent = objet.Titre;
                select.appendChild(option);
            });

            // 4. Insertion dans le conteneur
            exchangeContainer.appendChild(select);

            // Petit bonus : focus automatique sur le select
            select.focus();
        });
    }
});