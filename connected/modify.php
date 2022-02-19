<?php
require_once "../my-config.php";
require_once "../controllers/modifyController.php";
require_once "../controllers/admin-controller.php";

if (session_status() == PHP_SESSION_NONE) session_start();
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
    <title>Ajout de destinations</title>
</head>

<body>

    <header class="header d-lg-block d-none">

        <div class="text-white d-flex justify-content-end m-auto">
            <?php if (empty($_SESSION)) { ?><i class="bi bi-person pt-2"></i><a class="btn text-white" href="../espacePerso.php">Se connecter</a>
        </div>
    <?php } else { ?>
        <a href="<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['name'] ?></a>
        </div>

        <div class="text-white d-flex justify-content-end m-auto pe-2">
            <form action="../views/home.php" method="POST" class="logout">
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="../index.php" class="navbar-toggler text-white border border-dark d-flex d-lg-none text-decoration-none">Estenouest</a>

                <div class="collapse navbar-collapse text-start" id="navbarNav">
                    <ul class="navbar-nav container row">
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end ">
                            <a class="nav-link active" aria-current="page Accueil" href="../index.php">Accueil</a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page Catégories" href="../categories.php">Catégories</a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page Guide" href="../guide.php">Guide</a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page Blog" href="../blog.php">Blog</a>
                        </li>
                        <li class="d-lg-none nav-item justify-lg-content-end">
                            <?php if (session_status() == PHP_SESSION_NONE) { ?><a class="menu text-white nav-link active" href="espacePerso.php">Se connecter</a>
                            <?php } else { ?>
                                <a href="../connected/<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="text-white fs-4"><?= $_SESSION['name'] ?></a>
                            <?php } ?>
                        </li>
                        <?php if (!empty($_SESSION['login'])) { ?>
                            <li class="d-lg-none nav-item justify-lg-content-end">
                                <form action="" method="POST">
                                    <div><input type="submit" name="disconnect" value="Se déconnecter" class="btn btn-dark"></div>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if (isset($_POST['disconnect'])) { ?>
            <div class="text-center pt-5 pb-5">
                <div class="fw-bold fs-3 pb-3"> Vous avez bien été déconnecté.</div>
                <a href="../views/home.php"><button class="btn btn-dark">Retour à l'accueil</button></a>
            </div>
        <?php } else { ?>

            <?php if (isset($_POST['updateDestination'])) { ?>

                <div class="text-center pt-5 pb-5">
                    <div class="fw-bold fs-3 pb-3"> La destination a bien été modifiée.</div>
                    <a href="../connected/admin.php"><button class="btn btn-dark">Retour au menu</button></a>
                    <a href="../connected/updateDestination.php"><button class="btn btn-dark">Modifier une autre destination</button></a>
                </div>
            <?php } else { ?>

                <?php foreach ($getSingleArray as $single) { ?>


                    <div class="row text-center justify-content-center m-0 pb-3">

                        <h1 class="text-center fw-bold pt-4 pb-4">Modifier la destination:<?= $single['des_title'] ?></h1>
                        <form action="" method="POST" enctype="multipart/form-data" class="col-lg-4 row container-fluid border border-dark justify-content-center">

                            <label for="title" class="pt-3 fw-bold">Titre de la destination: </label>
                            <input type="text" name="title" id="title" value="<?= $single['des_title'] ?>" required>

                            <label for="picture" class="pt-3 fw-bold">Choix d'une photo:</label>
                            <div>Image actuelle :</div>
                            <img src="../assets/img/img_destinations/<?= $single['des_picture'] ?>" alt="" class="updateImage">
                            <div>Cliquez pour charger une nouvelle image</div>
                            <input type="file" name="picture" id="picture" value="<?= $single['des_picture'] ?>">

                            <label for="category" class="pt-3 fw-bold">Catégorie</label>
                            <select class="form-select" aria-label="category" name="category">
                                <option selected><?= $single['cat_category'] ?></option>
                                <?php foreach ($destinationArray as $destination) { ?>
                                    <option><?= $destination['cat_category'] ?></option>
                                <?php } ?>
                            </select>

                            <label for="content" class="pt-3 fw-bold">Description:</label>
                            <textarea type="text" name="content" id="content" required><?= $single['des_description'] ?></textarea>

                            <label for="cityCode" class="pt-3 fw-bold">City Code pour la météo: </label>
                            <input type="text" name="cityCode" id="cityCode" value="<?= $single['des_city_code'] ?>" required>

                            <label for="iframe" class="pt-3 fw-bold">iframe: </label>
                            <textarea type="text" name="iframe" id="iframe" required><?= $single['des_iframe'] ?></textarea>

                            <div class="pt-3 pb-3">
                                <input name="updateDestination" type="submit" value="Sauvegarder" class="col-lg-3 btn btn-outline-dark" />
                            </div>

                        </form>
                    </div>
        <?php }
            }
        } ?>

    </div>
    <footer class="footer bg-dark m-0" style="height: 15vh;">
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