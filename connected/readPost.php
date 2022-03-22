<?php

session_start();

if (session_status() != PHP_SESSION_ACTIVE) {
    header("location: ../index.php");
};


require_once "../controllers/admin-controller.php";
require_once "../controllers/readPostController.php";
require_once "../my-config.php";

if($_SESSION['name'] != 'Admin') {
    header('Location: ../index.php');
}

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

    <!-- SCRIPT TINYMCE -->
    <script src="https://cdn.tiny.cloud/1/9omz2kptnx5l2bso2564l98rmspvfdnsjtbeepm1xwy3tejf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <title>Rédaction d'articles</title>
</head>

<body>
    <header class="header d-lg-block d-none">

        <div class=" d-flex justify-content-end m-auto pt-3 pe-3">
            <a href="<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="buttons btn btn-dark btn-outline-light pe-3 text-decoration-none rounded"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['name'] ?></a>
        </div>

        <div class="d-flex justify-content-end m-auto pe-3">
            <form action="../views/home.php" method="POST">
                <div class="pt-2"><input class="btn btn-dark outBtn buttons text-white border border-none" type="submit" name="disconnect" value="Se déconnecter"></div>
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
                                <a href="../connected/<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="text-white fs-4"><?= $_SESSION['name'] ?></a>
                            <?php } ?>
                        </li>
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li class="d-lg-none nav-item justify-lg-content-end">
                                <form action="home.php" method="POST">
                                    <div><input type="submit" name="disconnect" value="Se déconnecter" class="logout border border-white rounded"></div>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="pt-5 ms-5">
            <a href="moderation.php"><button class="btn btn-outline-dark">Retour a la liste</button></a>
        </div>
        <?php foreach ($readArray as $post) { ?>
            <div class="row justify-content-center">
                <div class="col-lg-8 border border-dark bg-white m-5">
                    <h1 class="text-center pt-3 pb-1"><?= $post['blo_title'] ?></h1>
                    <div class="text-center fst-italic pb-3">Par <?= $post['use_first_name'] ?></div>

                    <?php if ($post['blo_picture'] != NULL) { ?>
                        <div class="text-center">
                            <img src="../assets/img/img_blog/<?= $post['blo_picture'] ?>" alt="Image d'illustration" class="w-75">
                        </div>
                    <?php } ?>

                    <p class="fs-5 text-center"><?= $post['blo_content'] ?></p>

                </div>
            </div>
        <?php } ?>


    </div>
    <footer class="footer" style="height: 15vh;">
        <div class="d-flex justify-content-evenly pt-5">
            <div class="">
                <p class="text-white">©Estenouest</p>
            </div>
            <a href="../cgu.php" class="text-white text-center text-decoration-none">
                <p class="text-white">Conditions Générales d'Utilisation</p>
            </a>
            <a href="../views/mentions.php" class="text-white text-decoration-none">
                <p class="text-white">Mentions Légales</p>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>