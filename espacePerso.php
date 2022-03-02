<?php

session_start();


require_once "controllers/connexion-controller.php";
require_once "my-config.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <title>Connexion</title>
</head>

<body>

    <header class="header d-lg-block d-none">
        <div class=" d-flex justify-content-end m-auto pt-3 pe-3">
            <a class="buttons btn btn-dark btn-outline-light pe-3 text-decoration-none rounded" href="espacePerso.php"><i class="bi bi-person pt-2 pe-2"></i>Se connecter</a>
        </div>
        <a href="views/home.php" class="text-decoration-none">
            <h1 class="mainTitle fw-bold text-white text-center <?php isset($_SESSION['name']) ? 'pt-2' : 'pt-5' ?>">Estenouest</h1>
            <div class="justify-content-center  row m-0 ">
                <div class="text-dark bg-white rounded  text-center fs-5 fst-italic col-lg-5">Choisissez votre prochaine destination et partagez vos expériences</div>
            </div>
        </a>
    </header>
    <div class="global m-0">

        <nav class="navbar navbar-expand-lg m-0">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"><i class="bi bi-list fs-2"></i></span>
                </button>
                <a href="index.php" class="navbar-toggler text-white border border-dark d-flex d-lg-none text-decoration-none">Estenouest</a>

                <div class="collapse navbar-collapse text-start m-0" id="navbarNav">
                    <ul class="navbar-nav container row">
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end ">
                            <a class="nav-link active" aria-current="page" href="index.php"><span class="text text-white">Accueil</span></a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page" href="categories.php"><span class="text text-white">Catégories</span></a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page" href="guide.php"><span class="text text-white">Guide</span></a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page" href="blog.php"><span class="text text-white">Blog</span></a>
                        </li>
                        <li class="d-lg-none nav-item justify-lg-content-end">
                            <a class="nav-link active" href="espacePerso.php">Se connecter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if (isset($_POST['submitButton'])) {

            if (!isset($_POST['helper']) &&  empty($errors) && empty($errorsConect)) { ?>


                <div class="text-center fw-bold pb-2 pt-5 fs-3 text-success">
                    <p>Votre inscription a été prise en compte, et votre compte sera activé dans les 24h</p>

                </div>

        <?php }
        } ?>


        <!-- **************************PARTIE POUR SE CONNECTER SI COMPTE DEJA CREE *******************************-->

        <div class="row text-center justify-content-center pt-5 pb-5 m-0">

            <p class="h3 fw-bold">Se Connecter</p>
            <form action="espacePerso.php" method="POST" class="row col-lg-5 pb-2 fw-bold border border-dark rounded">
                <input type="hidden" name="helper">
                <label for="login" class="col-lg-12 required">Email</label>
                <input type="text" class="col-lg-12" name="login">
                <label for="passwordConect" class="col-lg-12">Mot de Passe</label>
                <input type="password" class="col-lg-12" name="passwordConect">
                <div class="pt-3">

                    <button name="submit" type="submit" class="btn btn-dark col-lg-4 rounded">Connexion</button>

                </div>
            </form>

            <div class="text-danger fw-bold"><?= $errorsConect['invalid'] ?? '' ?></div>
            <div class="text-danger fw-bold"><?= $errorsConect['notApproved'] ?? '' ?></div>

        </div>

        <!-- **************************FIN PARTIE POUR SE CONNECTER SI COMPTE DEJA CREE *******************************-->



        <!-- **************************PARTIE POUR CREER UN COMPTE *******************************-->


        <?php

        if (isset($_POST['submitButton']) && empty($errors)) {
        } else { ?>
            <div class="row text-center justify-content-center pt-5 pb-5 m-0">

                <p class="h3 fw-bold">Inscription</p>
                <form method="POST" action="espacePerso.php" class="text-center border border-dark col-lg-5 p-5 m-0 rounded" name="inscription" id="inscription">
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
                            <label class="col-lg-12 pb-1 fw-bold" for="passwordUser">Mot de passe</label>
                            <input type="password" name="passwordUser" id="passwordUser" placeholder="Ex: MotdepaSSE" /><span class="fw-bold text-danger">
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
                            </label>
                            <span class="fw-bold text-danger"><?= $errors['checkbox'] ?? '' ?></span>
                        </div>
                        <!-- -----------------------------/\GARDER LES CGU OU PAS?/\------------------------------- -->
                    </fieldset>

                    <input class="fw-bold btn btn-dark rounded" type="submit" value="Inscription" name="submitButton" />
                    <div class="g-recaptcha" data-sitekey="6Ld1spQeAAAAAGZqtuTHlJQG4INz50QEmgPo5aj8"></div><span class="fw-bold text-danger"><?= $arrayErrors["captcha"] ?? "" ?></span>
                    <span class="fw-bold text-danger"><?= $errors['captcha'] ?? '' ?></span>
                </form>
            </div>
        <?php } ?>

        <!-- **************************FIN PARTIE POUR CREER UN COMPTE *******************************-->
    </div>
    <footer class="footer m-0" style="height: 15vh;">
        <div class="d-flex justify-content-evenly pt-5">
            <div class="">
                <p class="text-white">©Estenouest</p>
            </div>
            <div class="">
                <p class="text-white">Qui sommes-nous?</p>
            </div>
            <a href="views/mentions.php" class="text-white">
                <p class="text-white">Mentions Légales</p>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>