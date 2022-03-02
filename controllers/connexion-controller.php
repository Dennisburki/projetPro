<?php

require_once "my-config.php";
require_once "models/database.php";
require_once "models/accounts.php";

if (session_status() == PHP_SESSION_NONE) session_start();

//*********************************************** */ PARTIE CONCERNANT LA CONNEXION**********************************************************************


$errorsConect = [];

$loginObj = new Accounts();
$passwordObj = new Accounts();
$userStatusObj = new Accounts();



if (isset($_POST["submit"])) {


    if (!empty($_POST['login']) && !empty($_POST['passwordConect'])) {

        if ($loginObj->checkLogin($_POST['login']) !== FALSE) {

            $userStatusArray = $userStatusObj->getUserStatus($_POST['login']);

            foreach ($userStatusArray as $status) {

                $userStatus = $status['use_status'];

                if ($userStatus == 2) {
                    $errorsConect['notApproved'] = "Votre compte n'est pas encore approuvé par l'administrateur";
                }
            }


            if (password_verify($_POST['passwordConect'], $passwordObj->checkPassword($_POST['login'])['use_password'])) {
                if (empty($errorsConect)) {
                    $_SESSION = $loginObj->getUserConnect($_POST['login']);
                }
            } else {
                $errorsConect['invalid'] = "Login ou mot de passe invalide";
            }
        } else {
            $errorsConect['invalid'] = "Login ou mot de passe invalide";
        }
    }
}


//*********************************************** */ PARTIE CONCERNANT L'INSCRIPTION**********************************************************************

if (!empty($_POST)) {

    if (isset($_POST['submitButton']) && isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['passwordUser']) && isset($_POST['secondPassword'])) {

        $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,25}$/u";
        $errors = [];

        $email = htmlspecialchars($_POST["email"]); // le specialchars empeche d'ecrire du code dans les input et donc de faire des boucles infinis par ex.
        $firstName = htmlspecialchars($_POST["prenom"]);
        $password = htmlspecialchars($_POST["passwordUser"]);
        $secondPassword = htmlspecialchars($_POST["secondPassword"]);

        if (empty($_POST["email"])) {
            $errors["PasEmail"] = "Veuillez saisir un email";
        } else {
            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $_POST["email"])) {
                $errors["email"] = "Email invalide";
            }
        }

        if (empty($_POST["prenom"])) {
            $errors["prenom"] = "Veuillez saisir un prénom";
        } else {
            if (!preg_match($regexName, $firstName)) {
                $errors["pasPrenom"] = "Prénom invalide";
            }
        }

        if (empty($_POST["passwordUser"])) {
            $errors["password"] = "Veuillez saisir un mot de passe";
        }
        if (empty($_POST["secondPassword"])) {
            $errors["secondPassword"] = "Veuillez confirmer le mot de passe";
        } elseif ($_POST["passwordUser"] != $_POST["secondPassword"]) {
            $errors["wrongPassword"] = "Mot de passe différent";
        }
        if (!isset($_POST["checkbox"])) {
            $errors["checkbox"] = "Veuillez cocher la case";
        }

        if (empty($errors)) {

            $userObj = new Accounts();

            $name = $_POST['prenom'];
            $email = $_POST['email'];
            $password = password_hash($_POST['passwordUser'], PASSWORD_BCRYPT);

            $userObj->addUser($name, $email, $password);
        }

        //*********************************************VERIF DU CAPTCHA ********************************************************************

        if (isset($_POST['g-recaptcha-response'])) {
            $captcha = $_POST['g-recaptcha-response'];

            if (isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response'])) {

                $errors['captcha'] = "Veuillez prouver que vous n'êtes pas un robot";
            }
        }

        $secretKey = "6Ld1spQeAAAAABlNbNRqFZl_U76bqNRDwrWtCeQK";
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha ?? "");
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);
       
        if ($responseKeys["success"]) {
        } elseif (isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response'])) {
            $errors['captcha'] = "Veuillez prouver que vous n'êtes pas un robot";
        }

    } else {
        if (isset($_POST['submitButton'])) {
            $errors["allEmpty"] = "Veuillez remplir tous les champs";
        }
    }
}

//********************************Si deja connecté, redirige vers la page compte**************************************************

if (isset($_SESSION['login']) && empty($errorsConect)) {

    if ($_SESSION['role'] !== "1") {
        header("location: ../connected/user.php");
    } else {
        header("location: ../connected/admin.php");
    }
}
