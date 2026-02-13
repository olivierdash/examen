<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <main>
        <section>
            <h1>Liste des utilisateurs</h1>
            <ul>
                <?php foreach ($users as $user) { ?>
                    <li><?php echo $user['Nom']; ?> - <?php echo $user['email']; ?></li>
                <?php } ?>
            </ul>
        </section>
    </main>
</body>
</html>