<?php

session_start();

if (session_status() != PHP_SESSION_ACTIVE) {
    header("location: ../index.php");
};
require_once "../controllers/admin-controller.php";
require_once "../controllers/editController.php";
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

            <?php if (isset($_POST['publish']) && empty($arrayErrors)) { ?>

                <div class="text-success text-center fw-bold fs-4 pt-5">Votre article a bien été enregistré!</div>
                <div class="text-center fw-bold fs-4 pt-3">Il sera visible dans la partie <span><a href="../blog.php" class="text-dark">blog</a></span> après validation par l'équipe de modération!</div>
                <div class="pt-4 text-center pb-5">
                    <a href="user.php"><button class="btn btn-dark">Retour au Menu</button></a>
                    <a href="edit.php"><button class="btn btn-dark">Rédiger un autre article</button></a>
                </div>
            <?php } else { ?>
                <h1 class="text-center fw-bold pt-5 detailsTitle m-0">Rédaction d'articles</h1>

                <a href="user.php" class="ms-5 d-lg-block d-none pb-5"><button class="btn btn-outline-dark fs-5"><i class="bi bi-chevron-left"></i>Retour</button></a>
                <div class="row justify-content-center pb-3 m-0">
                    
                    <form action="edit.php" method="POST" enctype="multipart/form-data" class="col-lg-8 border border-dark bg-white pt-2 pb-2 text-center rounded">

                        <label for="title" class="fw-bold pb-3 pt-3">Titre de l'article:<span class="text-danger">*</span> </label></br>
                        <input type="text" name="title" id="title" class="w-75" required></br>
                        <div class="pt-5 pb-5">
                            <label for="upload" class="fw-bold pb-3">Choix d'une photo: </label></br>
                            <input name="upload" type="file" id="upload" /> <span class="text-danger fw-bold m-0"><?= $arrayErrors["mime"] ?? "" ?></span>
                        </div>

                        <textarea name="content" class="w-100">Commence à rédiger ton article ici!</textarea>
                        <div class="text-danger text-start">*Champs Obligatoires</div>
                        <div class="text-center pb-5 pt-2">
                            <input name="publish" type="submit" value="Publier" class="btn btn-dark" />
                        </div>
                    </form>
                </div>
        <?php }
        } ?>
    </div>
    <footer class="footer" style="height: 15vh;">
        <div class="d-flex justify-content-evenly pt-5">
            <div class="">
                <p class="text-white">©Estenouest</p>
            </div>
            <a href="../cgu.php" class="text-white text-center">
                <p class="text-white">Conditions Générales d'Utilisation</p>
            </a>
            <a href="../views/mentions.php" class="text-white">
                <p class="text-white">Mentions Légales</p>
            </a>
        </div>
    </footer>

    <!-- SCRIPT TINYMCE -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>