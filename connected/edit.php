<?php

session_start();

if (session_status() != PHP_SESSION_ACTIVE) {
    header("location: ../index.php");
};


require_once "../controllers/admin-controller.php";
require_once "../my-config.php";



?>

<!DOCTYPE html>
<html lang="fr">

<>
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
<a href="<?php if ($_SESSION['login'] == 'admin') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="btn text-white fs-4"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['login'] ?></a>
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
                            <a href="../connected/<?php if ($_SESSION['login'] == 'admin') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="text-white fs-4"><?= $_SESSION['login'] ?></a>
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

        <h1 class="text-center fw-bold pt-5 pb-5">Rédaction d'articles</h1>

        <form action="edit.php" method="POST" enctype="multipart/form-data">

            <label for="title">Titre de l'article: </label>
            <input type="text" name="title" id="title" required></br>
            <div class="pt-5 pb-5">
                <label for="upload">Choix d'une photo: </label>
                <input name="upload" type="file" id="upload" />
            </div>
            <?php var_dump($_POST); ?>
            <textarea name="content">
    Welcome to TinyMCE!
  </textarea>


            <div class="text-center pb-5 pt-2">
                <input name="submit" type="submit" value="Publier" class="btn btn-dark" />
            </div>
            <!--**** Il faudra utiliser cette fct pour upload vers la bdd move_uploaded_file ********************************-->
        </form>

    <?php } ?>

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