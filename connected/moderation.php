<?php

session_start();

if (session_status() != PHP_SESSION_ACTIVE) {
    header("location: ../index.php");
};


require_once "../controllers/admin-controller.php";
require_once "../controllers/moderationController.php";
require_once "../my-config.php";



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

        <div class="text-white d-flex justify-content-end m-auto">
            <?php if (empty($_SESSION)) { ?><i class="bi bi-person pt-2"></i><a class="btn text-white" href="../espacePerso.php">Se connecter</a>
        </div>
    <?php } else { ?>
        <a href="../connected/<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['name'] ?></a>
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
                                <a href="../connected/<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><?= $_SESSION['name'] ?></a>
                            <?php } ?>
                        </li>
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li class="d-lg-none nav-item justify-lg-content-end">
                                <form action="../views/home.php" method="POST">
                                    <div><input type="submit" name="disconnect" value="Se déconnecter" class="btn btn-dark"></div>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>


        <h1 class="text-center pt-3 pb-3">Modération des Articles</h1>

        <?php if (isset($_GET['validate'])) { ?>

            <div class="text-center text-success">La publication a été validée et publiée!</div>

        <?php } ?>

        <?php if (isset($_GET['delete'])) { ?>

            <div class="text-center text-success">La publication a été supprimée!</div>

        <?php } ?>

        <table class="table table-responsive table-striped justify-content-center text-center m-0">
            <thead>
                <tr>
                    <th scope="col" class="changeTable">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="changeTable">Author</th>
                    <th scope="col">Lire l'article</th>
                    <th scope="col">Approuver</th>
                    <th scope="col">Supprimer</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($displayPostArray as $post) { ?>
                    <tr>
                        <th class="changeTable" scope="row"><img src="../assets/img/img_blog/<?= $post['blo_picture'] ?>" alt="miniature d'illustration" class="updateImage"></th>
                        <td><?= $post['blo_title'] ?></td>
                        <td class="changeTable"><?= $post['use_first_name'] ?></td>
                        <td>
                            <form action="readPost.php?id=<?= $post['blo_id'] ?>" method="POST"><button type="submit" name="read" class="btn btn-dark"> Voir l'article</button></form>
                        </td>
                        <td>
                            <form action="moderation.php" method="POST"><button type="submit" name="validate" class="btn btn-success"> Valider</button></form>
                        </td>
                        <td>
                            <form action="moderation.php" method="POST"><button type="submit" name="delete" class="btn btn-danger">Supprimer</button></form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

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