<?php
require_once "../my-config.php";
require_once "../controllers/updateDestinationController.php";
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

        <?php if (isset($_POST['delete'])) { ?>


            <div class="text-center pt-5 pb-5">
                <div class="fw-bold fs-3 pb-3"> La destination a bien été supprimée.</div>
                <a href="../connected/updateDestination.php"><button class="btn btn-dark">Retour a la liste</button></a>
                <a href="../connected/admin.php"><button class="btn btn-dark">Retour au Menu</button></a>
            </div>
        <?php } else { ?>




            <h1 class="text-center pt-4 pb-2">Liste de toutes les destinations</h1>



            <div class="row justify-content-center m-0">
                <form action="updateDestination.php" method="POST" class="col-lg-2 row">
                    <select class="form-select" aria-label="category" name="category">
                        <option selected disabled><?= !empty($_POST['category']) ? $_POST['category'] : "Trier par catégorie" ?></option>
                        <?php foreach ($destinationArray as $destination) { ?>
                            <option><?= $destination['cat_category'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" class="btn btn-primary" value="Trier" name="sort">
                    <a href="updateDestination.php" class="pt-3 text-center pb-3"><button class="btn btn-dark">Voir tout</button></a>
                </form>

            </div>

            <?php foreach ($countArray as $count) { ?>
                <div class="fw-bold">Nombre de Destinations: <?= $count['total'] ?></div>
            <?php } ?>

            <table class="table table-responsive justify-content-center text-center m-0">
                <thead>
                    <tr>
                        <th scope="col" class="changeTable">ID</th>
                        <th scope="col" class="changeTable">Image</th>
                        <th scope="col" class="changeTable">Catégorie</th>
                        <th scope="col">Destination</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($_POST['category'])) { ?>

                        <?php foreach ($sortedArray as $details) { ?>

                            <tr>
                                <td class="changeTable"><?= $details['des_id'] ?></td>
                                <th class="changeTable" scope="row"><img src="../assets/img/img_destinations/<?= $details['des_picture'] ?>" alt="miniature d'illustration" class="updateImage"></th>
                                <td class="changeTable"><?= $details['cat_category'] ?></td>
                                <td><?= $details['des_title'] ?></td>
                                <td><a href="modify.php?id=<?= $details['des_id'] ?>"><button class="btn btn-primary"><i class="bi bi-pencil"></i> Modifier</button></a></td>
                                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $details['des_id'] ?>"><i class="bi bi-trash"></i> Supprimer</button></td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $details['des_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer la destination</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Etes-vous certain de vouloir supprimer <?= $details['des_title'] ?> de la liste des destinations?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <form action="updateDestination.php?id=<?= $details['des_id'] ?>" method="POST" class="pt-3">
                                                    <input type="submit" name="delete" value="Supprimer" class="btn btn-danger">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                        <?php }
                    } else { ?>
                        <?php foreach ($pageArray as $details) { ?>
                            <tr>
                                <td class="changeTable"><?= $details['des_id'] ?></td>
                                <th class="changeTable" scope="row"><img src="../assets/img/img_destinations/<?= $details['des_picture'] ?>" alt="miniature d'illustration" class="updateImage"></th>
                                <td class="changeTable"><?= $details['cat_category'] ?></td>
                                <td><?= $details['des_title'] ?></td>
                                <td><a href="modify.php?id=<?= $details['des_id'] ?>"><button class="btn btn-primary"><i class="bi bi-pencil"></i> Modifier</button></a></td>
                                <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $details['des_id'] ?>"><i class="bi bi-trash"></i> Supprimer</button></td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $details['des_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer la destination</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Etes-vous certain de vouloir supprimer <?= $details['des_title'] ?> de la liste des destinations?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <form action="updateDestination.php?id=<?= $details['des_id'] ?>" method="POST" class="pt-3">
                                                    <input type="submit" name="delete" value="Supprimer" class="btn btn-danger">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                <?php }
                    }
                } ?>

                <?php if (!isset($_POST['category'])) { ?>
                    <?php for ($i = 1; $i <= $nbPages; $i++) { ?>

                        <a href="?page=<?= $i ?>" class="btn <?= $i == $pages ? ' btn-primary' : 'btn-outline-primary' ?> ms-2"><?= $i ?></a>

                <?php }
                } ?>

                </tbody>
            </table>

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