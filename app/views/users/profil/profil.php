<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <section class="info-user">
            <h1>Profil de l'utilisateur</h1>
            <p>Nom :
                <?php echo $user['Nom']; ?>
            </p>
            <p>Email :
                <?php echo $user['email']; ?>
            </p>
        </section>
        <section class="lst-obj">
            <?php if( isset($objets) && !empty($objets) ){ ?>
                <h2>Objets possédés</h2>
            <ul>
                <?php foreach ($objets as $objet) { ?>
                    <article>
                        <h3><?php echo $objet['Titre']; ?></h3>
                        <p><?php echo $objet['Description']; ?></p>
                    </article>
                <?php } ?>
            </ul>
            <?php } else { ?>
                <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end"></div>
            <?php } ?>
        </section>
    </main>
</body>

</html>