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
    </main>
    <script>
        const propositionBtn = document.getElementById('proposition');
        propositionBtn.addEventListener('click', () => {
            // Afficher une liste de mes objets
            const myObjects = <?php echo json_encode($myObjects); ?>; // Récupérer mes objets depuis PHP
            let select = document.createElement('select');
            myObjects.forEach(obj => {
                let option = document.createElement('option');
                option.value = obj.ID;
                option.text = obj.Titre;
                select.appendChild(option);
            });
            document.body.appendChild(select);
        });
    </script>
</body>

</html>