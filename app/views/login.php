<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="fond col-md-6 col-sm-12">

            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row justify-content-center g-4">
                    <form method="POST" action="/user/create" class="bg-white p-4 mt-5">
                        <h2 class="mb-4">Creer un compte</h2>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Email*</label>
                            <input type="mail" class="form-control" id="mail" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe*</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur*</label>
                            <input type="text" class="form-control" id="username" name="nom">
                        </div>
                        <button type="submit" class="btn btn-dark text-white w-100">Valider</button>
                    </form>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-12">
                        <div class="d-block">
                            Vouz avez deja un compte ? <a href="/user/connect">Se connecter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const map = {
                nom: { input: "#nom", err: "#nomError" },
                email: { input: "#email", err: "#emailError" },
                password: { input: "#password", err: "#passwordError" }
            };
        });
    </script>
</body>

</html>