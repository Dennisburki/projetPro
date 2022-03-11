<?php

session_start();

require_once "controllers/admin-controller.php";
require_once "controllers/blogController.php";
require_once "my-config.php";

$delai = 5;
$url = 'http://projet.net/';
header("Refresh: $delai;url=$url");
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
    <title>Oups! Mauvaise direction</title>
</head>

<body>

    <header class="header d-lg-block d-none">


        <h1 class="mainTitle fw-bold text-white text-center pt-5">Estenouest</h1>
        <div class="justify-content-center  row m-0 ">
            <div class="text-dark bg-white rounded  text-center fs-5 fst-italic col-lg-5">Choisissez votre prochaine destination et partagez vos expériences</div>
        </div>



    </header>

    <div class="global m-0">

        <div class="global m-0">

            <div class="text-center fw-bold fs-1 pt-3 pb-3">Oups! Vous vous êtes perdu et vous voila sur la route 404!</div>
            <div class="text-center fw-bold fs-3 pt-3 pb-3">Pas de panique, tout le monde peut se perdre!</div>
            <div class="text-center fw-bold fs-3 pt-3 pb-3">Un peu de patience, vous allez être redirigé vers la page d'accueil</div>

            <div class="text-center pb-3">
                <img src="../assets/img/perdu.jpg" alt="Homme perdu regarde carte" class="rounded col-10 col-lg-5">
            </div>




        </div>

        <footer class="footer m-0" style="height: 15vh;">
            <div class="d-flex justify-content-evenly pt-5 m-0">
                <div class="">
                    <p class="text-white">©Estenouest</p>
                </div>
                <a href="cgu.php" class="text-white text-center">
                    <p class="text-white">Conditions Générales d'Utilisation</p>
                </a>
                <a href="views/mentions.php" class="text-white">
                    <p class="text-white">Mentions Légales</p>
                </a>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>