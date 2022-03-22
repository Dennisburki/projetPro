<?php
if (session_status() == PHP_SESSION_NONE) session_start();

require_once "../controllers/admin-controller.php";
require_once "../my-config.php";
require_once "../controllers/usersManagementController.php";

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
    <title>Admin</title>
</head>

<body>

    <header class="header d-lg-block d-none">

        <div class=" d-flex justify-content-end m-auto pt-3 pe-3">
            <a href="<?php if ($_SESSION['role'] == '1') { ?>admin.php<?php } else { ?>user.php<?php } ?>" class="buttons btn btn-dark btn-outline-light pe-3 text-decoration-none rounded"><i class="bi bi-person pt-2 pe-2"></i><?= $_SESSION['name'] ?></a>
        </div>

        <div class="d-flex justify-content-end m-auto pe-3">
            <form action="../views/home.php" method="POST">
                <div class="pt-2"><input class="btn btn-dark outbtn buttons text-white border border-none" type="submit" name="disconnect" value="Se déconnecter"></div>
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
                                    <div><input type="submit" name="disconnect" value="Se déconnecter" class="logout border border-white rounded"></div>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <h1 class="text-center pt-3">Gestion des utilisateurs</h1>
        <div class="text-center fw-bold">Il y a <?php foreach ($countArray as $count){ ?> <?= $count['Total'] ?> <?php } ?> utilisateurs enregistrés sur le site!</div>

        <a href="admin.php" class="ms-5 d-lg-block d-none"><button class="btn btn-outline-dark fs-5"><i class="bi bi-chevron-left"></i>Retour</button></a>

        <table class="table table-responsive justify-content-center text-center m-0">
            <thead>
                <tr>
                    <th scope="col" class="changeTable">ID</th>
                    <th scope="col">Prénom</th>
                    <th scope="col" class="changeTable">Email</th>
                    <th scope="col" class="changeTable">Statut du compte</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($allUsersArray as $users) { ?>

                    <tr>
                        <td class="changeTable"><?= $users['use_id'] ?></td>
                        <th scope="row"><?= $users['use_first_name'] ?></th>
                        <td class="changeTable"><?= $users['use_email'] ?></td>


                        <?php if ($users['use_status'] == 1) { ?>
                            <td class="text-success fw-bold changeTable">Actif</td>
                        <?php } else { ?>
                            <td class="text-danger fw-bold changeTable"> Inactif</td>
                        <?php } ?>


                        <?php if ($users['use_status'] == 2) { ?>
                            <td>

                                <form action="usersManagement.php?id=<?= $users['use_id'] ?>" method="POST" class="appBtn col-lg-5 rounded">
                                    <input type="submit" name="approve" value="Approuver" class="btn text-white">
                                </form>

                            </td>
                        <?php } else { ?>


                            <td>
                                <form action="usersManagement.php?id=<?= $users['use_id'] ?>" method="POST" class="blockBtn col-lg-5 rounded">
                                    <input type="submit" name="block" value="Bloquer" class="btn text-white">
                                </form>

                            </td>
                        <?php } ?>




                        <td class="blockBtn">
                            <div class="blockBtn col-lg-5 rounded"><button class="btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $users['use_id'] ?>"><i class="bi bi-trash"></i> Supprimer</button></div>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $users['use_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer l'utilisateur</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Etes-vous certain de vouloir supprimer <?= $users['use_first_name'] ?> de la liste des utilisateurs?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>


                                        <form action="usersManagement.php?id=<?= $users['use_id'] ?>" method="POST" class="pt-3">

                                            <input type="submit" name="delete" value="Supprimer" class="btn blockBtn col-lg-4 col-7 text-white rounded">

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>

                <?php } ?>
            </tbody>
        </table>


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