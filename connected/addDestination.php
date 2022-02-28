<?php
require_once "../my-config.php";
require_once "../controllers/addDestinationController.php";
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

        <div class=" d-flex justify-content-end m-auto pt-3 pe-3">
            <a href="<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="buttons btn btn-dark btn-outline-light pe-3 text-decoration-none rounded"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['name'] ?></a>
        </div>

        <div class="d-flex justify-content-end m-auto pe-3">
            <form action="../views/home.php" method="POST">
                <div class="pt-2"><input class="btn btn-dark btn-outline-danger buttons text-white border border-none" type="submit" name="disconnect" value="Se déconnecter"></div>
            </form>
        </div>


        <a href="../views/home.php" class="text-decoration-none">
            <h1 class="mainTitle fw-bold text-white text-center <?php isset($_SESSION['name']) ? 'pt-2' : 'pt-5' ?>">Estenouest</h1>
            <div class="justify-content-center  row m-0 ">
                <div class="text-dark bg-white rounded  text-center fs-5 fst-italic col-lg-5">Choisissez votre prochaine destination et partagez vos expériences</div>
            </div>

        </a>

    </header>
    <div class="global m-0">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"><i class="bi bi-list fs-2"></i></span>
                </button>
                <a href="../index.php" class="navbar-toggler text-white border border-dark d-flex d-lg-none text-decoration-none">Estenouest</a>

                <div class="collapse navbar-collapse text-start" id="navbarNav">
                    <ul class="navbar-nav container row">
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end ">
                            <a class="nav-link active" aria-current="page Accueil" href="../index.php"><span class="text text-white">Accueil</span></a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page Catégories" href="../categories.php"><span class="text text-white">Catégories</span></a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page Guide" href="../guide.php"><span class="text text-white">Guide</span></a>
                        </li>
                        <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                            <a class="nav-link active" aria-current="page Blog" href="../blog.php"><span class="text text-white">Blog</span></a>
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

            <h1 class="text-center fw-bold pt-4 pb-4">Ajouter une destination</h1>

            <a href="admin.php" class="ms-5 d-lg-block d-none"><button class="btn btn-outline-dark fs-5"><i class="bi bi-chevron-left"></i>Retour</button></a>

            <?php if (isset($_POST['addDestination']) && empty($arrayErrors)) { ?><div class="text-center text-success fs-5">Destination ajoutée avec Succès!</div><?php } ?>


            <div class="row text-center justify-content-center m-0 pb-3">
                <form action="" method="POST" enctype="multipart/form-data" class="col-lg-4 row container-fluid border border-dark justify-content-center" novalidate>

                    <label for="title" class="pt-3 fw-bold">Titre de la destination: </label>
                    <input type="text" name="title" id="title" placeholder="Ex: Madrid" value="<?= $_POST['title'] ?? '' ?>" required>
                    <div class="text-danger fw-bold"><?= $arrayErrors['noTitle'] ?? '' ?></div>

                    <label for="picture" class="pt-3 fw-bold">Choix d'une photo:</label>
                    <input type="file" name="picture" id="picture" required>
                    <div class="text-danger fw-bold"><?= $arrayErrors['noPicture'] ?? '' ?></div>

                    <label for="category" class="pt-3 fw-bold">Catégorie</label>
                    <select class="form-select" aria-label="category" name="category">
                        <option selected disabled><?= $_POST['category'] ?? 'Choisissez une catégorie' ?></option>
                        <?php foreach ($destinationArray as $destination) { ?>
                            <option><?= $destination['cat_category'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="text-danger fw-bold"><?= $arrayErrors['noCategory'] ?? '' ?></div>


                    <label for="content" class="pt-3 fw-bold">Description:</label>
                    <textarea type="text" name="content" id="content" value="<?= $_POST['content'] ?? '' ?>" required></textarea>
                    <div class="text-danger fw-bold"><?= $arrayErrors['noContent'] ?? '' ?></div>
                    <div class="text-danger fw-bold"><?= $arrayErrors['noActivity'] ?? '' ?></div>

                    <div class="row">

                        <?php foreach ($activitiesArray as $activity) { ?>
                            <div class="form-check text-start d-inline-block col-lg-4">
                                <input class="form-check-input" type="checkbox" id="<?= $activity['act_name'] ?>" name="<?= $activity['act_name'] ?>">
                                <label class="form-check-label" for="<?= $activity['act_name'] ?>">
                                    <?= $activity['act_name'] ?>
                                </label>
                            </div>
                        <?php } ?>

                    </div>

                    <label for="cityCode" class="pt-3 fw-bold">City Code pour la météo: </label>
                    <input type="text" name="cityCode" id="cityCode" value="<?= $_POST['cityCode'] ?? '' ?>" required>
                    <div class="text-danger fw-bold"><?= $arrayErrors['noCode'] ?? '' ?></div>

                    <label for="iframe" class="pt-3 fw-bold">iframe: </label>
                    <input type="text" name="iframe" id="iframe" value="<?= $_POST['iframe'] ?? '' ?>" required>
                    <div class="text-danger fw-bold"><?= $arrayErrors['noIframe'] ?? '' ?></div>

                    <div class="pt-3 pb-3">
                        <input name="addDestination" type="submit" value="Ajouter" class="col-lg-2 btn btn-outline-dark" />
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LfX4WIeAAAAAPRdoEK_zY_adUmkdscRNt-znykP"></div><span class="fw-bold text-danger"><?= $arrayErrors["captcha"] ?? "" ?></span>

                </form>
            </div>


        <?php } ?>
    </div>
    <footer class="footer m-0" style="height: 15vh;">
        <div class="d-flex justify-content-evenly pt-5">
            <div class="">
                <p class="text-white">©Estenouest</p>
            </div>
            <div class="">
                <p class="text-white">Qui sommes-nous?</p>
            </div>
            <a href="../views/mentions.php" class="text-white">
                <p class="text-white">Mentions Légales</p>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>