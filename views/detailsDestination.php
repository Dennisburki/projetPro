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

    <a href="https://icons8.com/icon/undefined/undefined"></a>

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

        <div class=" d-flex justify-content-end m-auto pt-3 pe-3">
            <?php if (empty($_SESSION['login'])) { ?><a class="buttons btn btn-dark btn-outline-light pe-3 text-decoration-none rounded" href="../espacePerso.php"><i class="bi bi-person pt-2 pe-2"></i>Se connecter</a>
        </div>
    <?php } else { ?>
        <a href="../connected/<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="buttons btn btn-dark btn-outline-light pe-3 text-decoration-none rounded"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['name'] ?></a>
        </div>

        <div class="d-flex justify-content-end m-auto pe-3">
            <form action="home.php" method="POST">
                <div class="pt-2"><input class="btn btn-dark outBtn buttons text-white border border-none" type="submit" name="disconnect" value="Se déconnecter"></div>
            </form>
        </div>
    <?php } ?>

    <a href="../index.php" class="text-decoration-none">
        <h1 class="mainTitle fw-bold text-white text-center <?php isset($_SESSION['name']) ? 'pt-2' : 'pt-5' ?>">Estenouest</h1>
        <div class="justify-content-center  row m-0 ">
            <div class="text-dark bg-white rounded  text-center fs-5 fst-italic col-lg-5">Choisissez votre prochaine destination et partagez vos expériences</div>
        </div>

    </a>


    </header>
    <div class="global m-0">

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid m-0">
                <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"><i class="bi bi-list fs-2"></i></span>
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
                                <a href="../connected/<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><?= $_SESSION['name'] ?></a>
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

            <?php if (!empty($_SESSION)) { ?>
                <?php $addedObj = new Destinations();
                if ($addedObj->addedWishlist($details['des_id'], $_SESSION['id']) !== FALSE) { ?>

                    <div class="text-center appBtn pb-2 pt-2 m-0" name="wishlist" id="liveToastBtn">Ajouté à ma wishlist</div>

            <?php }
            } ?>

            <h1 class="text-center fw-bold pt-5 detailsTitle">Découvrez <?= $details['des_title'] ?> !</h1>
            <div class="text-center m-0">
                <div class="fw-bold fst-italic">Cette destination a été consultée <?= $visitObj->getVisit($id)['des_visit'] ?> fois !</div>
            </div>
            <a href="views.php?id=<?= $details['cat_id'] ?>" class="ms-5 d-lg-block d-none"><button class="btn btn-outline-dark fs-5"><i class="bi bi-chevron-left"></i>Retour</button></a>


            <div class="text-center pt-5">
                <img src="../assets/img/img_destinations/<?= $details['des_picture'] ?>" alt="Image d'illustration" class="w-50 rounded">
            </div>

            <div class="mainText  m-auto pt-3">
                <p class="text-center fw-bold fs-5"><?= $details['des_description'] ?></p>


                <p class=" fw-bold fs-5 text-center pt-5">Les Principales activités sur place sont : </p>
                <ul class="d-inline-block d-flex row fs-5 listStyle">
                    <?php foreach ($activitiesArray as $activities) { ?>
                        <li class="col-lg-4 col-7"><img src="../assets/icons/<?= $activities['act_icon'] ?>" alt=""></br>
                            <div class="col-lg-2 text-center">
                                <?= $activities['act_name'] ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>

            </div>
            <div class="text-center pb-3">
                <?php if (!empty($_SESSION) && $addedObj->addedWishlist($details['des_id'], $_SESSION['id']) == FALSE) { ?>
                    <form action="" method="POST">
                        <input type="submit" class="btn btn-dark" value="Ajouter à la wishlist" name="wishlist" id="liveToastBtn">
                        <input type="hidden" name="id" value="<?= $details['des_id'] ?>">
                    </form>
                <?php } ?>
            </div>



            <div class="text-center fw-bold fs-3 pt-2">Où se trouve <?= $details['des_title'] ?> ?</div>
            <div class="container-fluid">
                <div class="text-center responsive-iframe"><?= $details['des_iframe'] ?></div>
            </div>

            <div class="text-center fw-bold fs-3 pb-1 pt-5">La météo à <?= $details['des_title'] ?> :</div>
            <div id="openweathermap-widget-21" class="d-none d-lg-block"></div>
            <div id="openweathermap-widget-24" class="d-lg-none d-block"></div>
        <?php } ?>

    </div>


    <footer class="footer m-0">
        <div class="d-flex justify-content-evenly pt-5">
            <div class="">
                <p class="text-white">©Estenouest</p>
            </div>
            <a href="../cgu.php" class="text-white text-center text-decoration-none">
                <p class="text-white">Conditions Générales d'Utilisation</p>
            </a>
            <a href="mentions.php" class="text-white text-decoration-none">
                <p class="text-white">Mentions Légales</p>
            </a>
        </div>
    </footer>




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