<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-12">
                <form method="POST" action="/user/connect" class="bg-white p-4 mt-5">
                    <h2 class="mb-4">Connectez vous a votre compte</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-12">
                <div class="d-flex justify-content-center">
                     Pas encore de compte ?<a href="/"> Creer un compte</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>