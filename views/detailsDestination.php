<?php

session_start();

require_once "../controllers/admin-controller.php";
require_once "../my-config.php";
require_once "../controllers/detailsController.php";

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
    <title>Destination</title>
</head>

<body>

    <header class="header d-lg-block d-none">

        <div class="text-white d-flex justify-content-end m-auto">
            <?php if (empty($_SESSION)) { ?><i class="bi bi-person pt-2"></i><a class="btn text-white" href="../espacePerso.php">Se connecter</a>
        </div>
    <?php } else { ?>
        <a href="../connected/<?php if ($_SESSION['login'] == 'admin') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['login'] ?></a>
        </div>

        <div class="text-white d-flex justify-content-end m-auto pe-2">
            <form action="home.php" method="POST" class="logout">
                <div class="fs-5 logout"><i class="bi bi-box-arrow-left"></i><input type="submit" name="disconnect" value="Se déconnecter" class="btn logout text-white fs-6"></div>
            </form>
        </div>
    <?php } ?>

    <a href="../index.php" class="text-decoration-none">
        <h1 class="mainTitle fw-bold text-white text-center pt-5">Estenouest</h1>
        <div class="text-white text-center fs-4 fst-italic">Choisissez votre prochaine destination et partagez vos expériences</div>
    </a>


    </header>
    <div class="global">

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid m-0">
                <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white pt-1 pe-5">Menu</span>
                </button>
                <a href="../index.php" class="navbar-toggler text-white border border-dark d-flex d-lg-none text-decoration-none">Estenouest</a>

                <div class="collapse navbar-collapse text-start" id="navbarNav">
                    <ul class="navbar-nav container row">
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end ">
                            <div class="text-start text-lg-center">
                                <a class="menu nav-link active" aria-current="page" href="../index.php"><span class="text text-white">Accueil</span></a>
                            </div>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <div class="text-start text-lg-center">
                                <a class="menu nav-link active  text-white" aria-current="page" href="../categories.php"><span class="text text-white">Catégories</span></a>
                            </div>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <div class="text-start text-lg-center">
                                <a class="menu nav-link active  text-white" aria-current="page" href="../guide.php"><span class="text text-white">Guide</span></a>
                            </div>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <div class="text-start text-lg-center">
                                <a class="menu nav-link active  text-white" aria-current="page" href="../blog.php"><span class="text text-white">Blog</span></a>
                            </div>
                        </li>
                        <li class="d-lg-none nav-item justify-lg-content-end">
                            <?php if (empty($_SESSION)) { ?><a class="menu text-white nav-link active" href="../espacePerso.php">Se connecter</a>
                            <?php } else { ?>
                                <a href="../connected/<?php if ($_SESSION['login'] == 'admin') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><?= $_SESSION['login'] ?></a>
                            <?php } ?>
                        </li>
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li class="d-lg-none nav-item justify-lg-content-end">
                                <form action="home.php" method="POST">
                                    <div><input type="submit" name="disconnect" value="Se déconnecter" class="btn btn-dark"></div>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>



        <?php foreach ($detailsArray as $details) { ?>
            <h1 class="text-center fw-bold pt-5 detailsTitle">Découvrez <?= $details['des_title'] ?> !</h1>

            <a href="views.php?id=<?= $details['cat_id'] ?>" class="text-dark fs-5 ps-3 d-lg-block d-none"><button class="btn btn-outline-dark"><i class="bi bi-chevron-left"></i>Retour</button></a>


            <div class="text-center pt-5">
                <img src="../assets/img/img_destinations/<?= $details['des_picture'] ?>" alt="Image d'illustration" class="w-50 rounded">
            </div>

            <div class="mainText text-center m-auto pt-3">
                <p class="text-center fw-bold fs-5"><?= $details['des_description'] ?></p>
            </div>
            <div class="text-center pb-3">
                <?php if (!empty($_SESSION)) { ?><a href="#" class="btn btn-dark">Ajouter à la wishlist</a><?php } ?>
            </div>

            <div class="text-center fw-bold fs-3 pt-2">Où se trouve <?= $details['des_title'] ?> ?</div>
            <div class="container">
                <div class="text-center responsive-iframe"><?= $details['des_iframe'] ?></div>
            </div>

            <div class="text-center fw-bold fs-3 pb-1 pt-5">La météo à <?= $details['des_title'] ?> :</div>
            <div id="openweathermap-widget-21" class="d-none d-lg-block"></div>
            <div id="openweathermap-widget-24" class="d-lg-none d-block"></div>


        <?php } ?>


        <footer class="footer m-auto" style="height: 15vh;">
            <div class="d-flex justify-content-evenly pt-5 m-auto">
                <div class="m-auto">
                    <p class="text-white">©Estenouest</p>
                </div>
                <div class="m-auto">
                    <p class="text-white">Qui sommes-nous?</p>
                </div>
                <div class="m-auto">
                    <p class="text-white">Mentions Légales</p>
                </div>
            </div>
        </footer>
    </div>



    <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script>
    <script>
        window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
        window.myWidgetParam.push({
            id: 21,
            cityid: '<?php foreach ($detailsArray as $details) { ?><?= $details['des_city_code'] ?><?php } ?>',
            appid: '7ef1308ca5816422ab52653980391445',
            units: 'metric',
            containerid: 'openweathermap-widget-21',
        });
        (function() {
            var script = document.createElement('script');
            script.async = true;
            script.charset = "utf-8";
            script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(script, s);
        })();
    </script>



    <script>
        window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
        window.myWidgetParam.push({
            id: 24,
            cityid: '<?php foreach ($detailsArray as $details) { ?><?= $details['des_city_code'] ?><?php } ?>',
            appid: '7ef1308ca5816422ab52653980391445',
            units: 'metric',
            containerid: 'openweathermap-widget-24',
        });
        (function() {
            var script = document.createElement('script');
            script.async = true;
            script.charset = "utf-8";
            script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(script, s);
        })();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>