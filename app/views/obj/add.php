<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouvel objet | Vitrine</title>
    <link rel="stylesheet" href="/assets/bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class=" box col-sm-6">
            <div class="row">
                <h1>Ajouter un nouvel objet</h1>
                <form action="/obj/add" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label"><span><Strong>Nom de l'objet :</Strong></span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ex : T-shirt" required>
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label"><span><Strong>Description :</Strong></span></label>
                        <textarea class="form-control" id="desc" name="desc" placeholder="Ex : bleu" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label"><span><strong>Prix :</strong></span></label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Ex : 20 000" required>
                    </div>

                    <div class="mb-3">
                        <label for="img">Importez une ou plusieurs images</label>
                        <input type="file" class="form-control" id="img" name="img[]" accept="image/*" multiple required>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter l'objet</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>