<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>

    <header class="header d-lg-block d-none">

        <div class="text-white d-flex justify-content-end m-auto">
            <i class="bi bi-person pt-2"></i><a class="btn text-white" href="espacePerso.php">Se connecter</a>
        </div>

        <a href="index.php" class="text-decoration-none">
            <h1 class="mainTitle fw-bold text-white text-center pt-5">Estenouest</h1>
        </a>


    </header>

    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="index.php" class="navbar-toggler text-white border border-dark d-flex d-lg-none text-decoration-none">Estenouest</a>

            <div class="collapse navbar-collapse text-start" id="navbarNav">
                <ul class="navbar-nav container row">
                    <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end ">
                        <div class="text-center">
                            <a class="menu nav-link active bg-dark" aria-current="page" href="index.php"><span class="text text-white">Accueil</span></a>
                        </div>
                    </li>
                    <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                        <div class="text-center">
                            <a class="menu nav-link active bg-dark  text-white" aria-current="page" href="categories.php"><span class="text text-white">Catégories</span></a>
                        </div>
                    </li>
                    <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                        <div class="text-center">
                            <a class="menu nav-link active bg-dark  text-white" aria-current="page" href="guide.php"><span class="text text-white">Guide</span></a>
                        </div>
                    </li>
                    <li class="nav-item col-lg-3 d-lg-flex justify-content-lg-end">
                        <div class="text-center">
                            <a class="menu nav-link active bg-dark  text-white" aria-current="page" href="blog.php"><span class="text text-white">Blog</span></a>
                        </div>
                    </li>
                    <li class="d-lg-none nav-item justify-lg-content-end">
                        <a class="nav-link active" href="espacePerso.php">Se connecter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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