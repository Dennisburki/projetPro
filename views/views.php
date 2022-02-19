<?php

session_start();

require_once "../controllers/admin-controller.php";
require_once "../my-config.php";
require_once "../controllers/viewsController.php";

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
    <title>Catégorie</title>
</head>

<body>

    <header class="header d-lg-block d-none m-0">

        <div class="text-white d-flex justify-content-end m-auto">
            <?php if (empty($_SESSION)) { ?><i class="bi bi-person pt-2"></i><a class="btn text-white " href="../espacePerso.php">Se connecter</a>
        </div>
    <?php } else { ?>
        <a href="../connected/<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['name'] ?></a>
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
    <div class="global m-0">

        <nav class="navbar navbar-expand-lg m-0">
            <div class="container-fluid m-0">
                <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white pt-1 pe-5">Menu</span>
                </button>
                <a href="../index.php" class="navbar-toggler text-white border border-dark d-flex d-lg-none text-decoration-none">Estenouest</a>

                <div class="collapse navbar-collapse text-start m-0" id="navbarNav">
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
                        <li class="d-lg-none nav-item">
                            <?php if (empty($_SESSION)) { ?><a class="menu text-white nav-link active" href="../espacePerso.php">Se connecter</a>
                            <?php } else { ?>
                                <a href="../connected/<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><?= $_SESSION['name'] ?></a>
                            <?php } ?>
                        </li>
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li class="d-lg-none nav-item">
                                <form action="home.php" method="POST">
                                    <div><input type="submit" name="disconnect" value="Se déconnecter" class="btn text-white"></div>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php foreach ($getCategoryTitleArray as $details) { ?>
            <div class="text-center m-auto fw-bold pt-2 viewsTitle"><?= $details['cat_category'] ?></div>
        <?php } ?>
        <div class="row m-0">
            <a href="../categories.php" class="text-dark col-lg-2 fs-5 ps-3 d-lg-block d-none"><button class="btn btn-outline-dark"><i class="bi bi-chevron-left"></i>Retour aux catégories</button></a>
        </div>
        <div class="row m-auto pt-2 m-0">


            <?php foreach ($destinationDetailsArray as $details) { ?>
                <div class="col-lg-4 categorie-card d-flex justify-content-center pt-3 pb-3 m-0">
                    <div class="card categorie-card col-lg-12 pt-3">
                        <div class="text-center">
                            <img src="../assets/img/img_destinations/<?= $details['des_picture'] ?>" class="card-img-top cat-image" alt="Image d'illustration">
                        </div>
                        <div class="card-body">
                            <div class="card-title text-center h3 fw-bold"><?= $details['des_title'] ?></div>
                            <p class="card-text text-center fw-bold description"><?= $details['des_description'] ?></p>
                            <div class="row text-center">
                                <?php if (!empty($_SESSION)) { ?>

                                    <div class="col-lg-6 pb-2"><a href="detailsDestination.php?id=<?= $details['des_id'] ?>" class="btn btn-dark">Détails</a></div>
                                    <div class="col-lg-6 pb-2">
                                        <?php $addedObj = new Destinations();
                                        if ($addedObj->addedWishlist($details['des_id']) !== FALSE) { ?>

                                                <div  class="bg-success text-white pb-2 pt-2 rounded" name="wishlist" id="liveToastBtn">Ajouté à ma wishlist</div>
                                            
                                        <?php } else { ?>
                                            <form action="" method="POST">
                                                <input type="submit" class="btn btn-dark" value="Ajouter à la wishlist" name="wishlist" id="liveToastBtn">
                                                <input type="hidden" name="id" value="<?= $details['des_id'] ?>">
                                            </form>
                                        <?php } ?>

                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <div class="col-lg-12 text-center"><a href="detailsDestination.php?id=<?= $details['des_id'] ?>" class="btn btn-dark">Détails</a></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>


            <footer class="footer m-0" style="height: 15vh;">
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

            <script src="../assets/js/script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>