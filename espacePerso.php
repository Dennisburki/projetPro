<?php
require "controllers/connexion-controller.php";
require "my-config.php";

var_dump($_SESSION);
var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>

    <header class="header d-lg-block d-none">
        <div class="text-white d-flex justify-content-end m-auto">
            <i class="bi bi-person pt-2"></i><a class="btn text-white" href="espacePerso.php">Se connecter</a>
        </div>
        <a href="index.php" class="text-decoration-none">
            <h1 class="mainTitle fw-bold text-white text-center pt-5">Estenouest</h1>
        </a>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="index.php" class="navbar-toggler text-white border border-dark d-flex d-lg-none text-decoration-none">Estenouest</a>

            <div class="collapse navbar-collapse text-start" id="navbarNav">
                <ul class="navbar-nav container row">
                    <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end ">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                        <a class="nav-link active" aria-current="page" href="categories.php">Catégories</a>
                    </li>
                    <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                        <a class="nav-link active" aria-current="page" href="guide.php">Guide</a>
                    </li>
                    <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                        <a class="nav-link active" aria-current="page" href="blog.php">Blog</a>
                    </li>
                    <li class="d-lg-none nav-item justify-lg-content-end">
                        <a class="nav-link active" href="espacePerso.php">Se connecter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    

    <!-- **************************PARTIE POUR SE CONNECTER SI COMPTE DEJA CREE *******************************-->

    <div class="row text-center justify-content-center pt-5 pb-5">

        <p class="h3 fw-bold">Se Connecter</p>
        <form action="espacePerso.php" method="POST" class="row col-lg-3 pb-2 fw-bold border border-dark" >
            <input type="hidden" name="helper">
            <label for="login" class="col-lg-12 required">Email</label>
            <input type="text" class="col-lg-12" name="login">
            <label for="passwordConect" class="col-lg-12">Password</label>
            <input type="password" class="col-lg-12" name="passwordConect">
            <div class="pt-3">

                <button name="submit" type="submit" class="btn btn-dark col-lg-6 rounded">Connexion</button>

            </div>
        </form>
        <?php if (!empty($errorsConect) && isset($_POST['submit'])) { ?>
            <div class="text-danger fw-bold"><?= $errorsConect['invalid'] ?></div>
        <?php } ?>
    </div>

    <!-- **************************FIN PARTIE POUR SE CONNECTER SI COMPTE DEJA CREE *******************************-->



    <!-- **************************PARTIE POUR CREER UN COMPTE *******************************-->
    

     <?php

     if(isset($_POST['submitButton'])){
     
     if (!isset($_POST['helper']) &&  empty($errors) && empty($errorsConect)) { ?>


        <div class="text-center fw-bold pb-2 pt-5 fs-3 text-success">
            <p>Inscription ok</p>
            <p>Veuillez vous connecter</p>
        </div>
   
    <?php }} else { ?>
        <div class="row text-center justify-content-center pt-5 pb-5">

            <p class="h3 fw-bold">Inscription</p>
            <form method="POST" action="espacePerso.php" class="text-center border border-dark col-lg-4 p-5" name="inscription" id="inscription">
                <p> <?= $errors['allEmpty'] ?? '' ?></p>

                <fieldset class="pb-3">

                    <div class="row">
                        <label for="nom" class="col-12 pb-1 fw-bold">Prénom</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Ex: Guy" value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : "" ?>" /><span class="fw-bold text-danger">
                            <?= $errors['pasPrenom'] ?? "" ?><?= $errors['prenom'] ?? "" ?></span>
                    </div>

                    <div class="row">
                        <label class="col-lg-12 pb-1 fw-bold" for="prenom">Email</label>
                        <input type="email" name="email" id="email" placeholder="Ex: Dupond@orange.fr" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "" ?>" /><span class="fw-bold text-danger">
                            <?= $errors['pasEmail'] ?? '' ?><?= $errors['email'] ?? '' ?></span>

                    </div>

                    <div class="row">
                        <label class="col-lg-12 pb-1 fw-bold" for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="Ex: MotdepaSSE" /><span class="fw-bold text-danger">
                            <?= $errors['password'] ?? '' ?></span>
                    </div>

                    <div class="row">
                        <label class="col-lg-12 pb-1 fw-bold" for="secondPassword">Confirmation de Mot de passe</label>
                        <input type="password" name="secondPassword" id="secondPassword" placeholder="Ex: MotdepaSSE" /><span class="fw-bold text-danger">
                            <?= $errors['secondPassword'] ?? '' ?><?= $errors['wrongPassword'] ?? '' ?></span>
                    </div>

                    <!-- -----------------------------\/GARDER LES CGU OU PAS?\/------------------------------- -->
                    <div class="form-check text-start pt-3">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox" name="checkbox">
                        <label class="form-check-label" for="checkbox">
                            Accepter les CGU
                        </label><span class="fw-bold text-danger">
                            <?= $errors['checkbox'] ?? '' ?></span>
                    </div>

                    <!-- -----------------------------/\GARDER LES CGU OU PAS?/\------------------------------- -->
                </fieldset>

                <input class="fw-bold btn btn-dark rounded" type="submit" value="Inscription" name="submitButton" />

            </form>
        </div>
    <?php } ?>

    <!-- **************************FIN PARTIE POUR CREER UN COMPTE *******************************-->

    <footer class="footer bg-dark" style="height: 15vh;">
        <div class="d-flex justify-content-evenly pt-5">
            <div class="">
                <p class="text-white">©Estenouest</p>
            </div>
            <div class="">
                <p class="text-white">Qui sommes-nous?</p>
            </div>
            <div class="">
                <p class="text-white">Mentions Légales</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>