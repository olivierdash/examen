<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objet</title>
</head>

<body>
    <main>
        <section>
            <h1><?php echo $objet['Titre']; ?></h1>
            <h2>Catégorie :
                <?php echo $categorie['Nom']; ?>
            </h2>
            <p><?php echo $objet['Description']; ?></p>
            <p>Prix : <?php echo $objet['Prix']; ?> €</p>
        </section>
        <aside>
            <button id="proposition">Proposer un échange</button>
        </aside>
        <div class="retour">
            <a href="/accueil">Retour à l'accueil</a>
        </div>
    </main>
    <script nonce="<?= Flight::get('csp_nonce') ?>">
        const boutonProposition = document.getElementById('proposition');

        boutonProposition.addEventListener('click', () => {
            // 1. Supprime l'ancien select s'il existe déjà
            let selectExistant = document.getElementById('select-existant');
            if (selectExistant) {
                selectExistant.remove();
            }

            const mesObjets = <?php echo json_encode($myObjects); ?>;

            // 2. Crée le nouvel élément select
            let select = document.createElement('select');
            select.id = 'select-existant';

            select.multiple = true;

            mesObjets.forEach(Objet => {
                let option = document.createElement('option');
                option.value = Objet.ID; // Utilise bien les majuscules selon ton var_dump
                option.textContent = Objet.Titre;
                select.appendChild(option);
            });

            // 3. IMPORTANT : Ajoute le select dans le document pour qu'il apparaisse
            // Ici, on l'ajoute juste après le bouton
            boutonProposition.parentNode.insertBefore(select, boutonProposition.nextSibling);
        });
    </script>
</body>

</html>