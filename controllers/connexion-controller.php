<?php

require "my-config.php";

if (session_status() == PHP_SESSION_NONE) session_start();

//*********************************************** */ PARTIE CONCERNANT LA CONNEXION**********************************************************************


$errorsConect = [];

if (!empty($_POST['login']) && !empty($_POST['passwordConect'])) {

    if(array_key_exists($_POST['login'], $usersArray)) {

        if(password_verify($_POST['passwordConect'], $usersArray[$_POST['login']]['password'])) {

        $_SESSION['login'] = $_POST['login'];

        if($_SESSION['login'] == 'admin'){
            

        header("Location: connected/admin.php");

         } else {

            header("Location: connected/user.php");
        }
}
    } else {
        $errorsConect['invalid'] = "Login ou mot de passe invalide";
    }
}


//*********************************************** */ PARTIE CONCERNANT L'INSCRIPTION**********************************************************************

if (!empty($_POST)) {

    if (isset($_POST['submitButton']) && isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['secondPassword'])) {

        $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,25}$/u";
        $errors = [];

        $email = htmlspecialchars($_POST["email"]); // le specialchars empeche d'ecrire du code dans les input et donc de faire des boucles infinis par ex.
        $firstName = htmlspecialchars($_POST["prenom"]);
        $password = htmlspecialchars($_POST["password"]);
        $secondPassword = htmlspecialchars($_POST["secondPassword"]);

        if (empty($_POST["email"])) {
            $errors["PasEmail"] = "Veuillez saisir un email";
        } else {
            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$_POST["email"])) {
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

        if (empty($_POST["password"])) {
            $errors["password"] = "Veuillez saisir un mot de passe";
        }
        if (empty($_POST["secondPassword"])) {
            $errors["secondPassword"] = "Veuillez confirmer le mot de passe";
        } elseif  ($_POST["password"] != $_POST["secondPassword"]){
            $errors["wrongPassword"] = "Mot de passe différent";
        }
        if (!isset($_POST["checkbox"])) {
            $errors["checkbox"] = "Coche la case";
        }
    } else {
        if(isset($_POST['submitButton'])){
        $errors["allEmpty"] = "Veuillez remplir tous les champs";
        }
    }
} 

//********************************Si deja connecté, redirige vers la page compte**************************************************

 if (isset($_SESSION['login'])) {

    if($_SESSION['login'] != "admin") {
        header("location: ../connected/user.php");
    } else {
        header("location: ../connected/admin.php");
    }
}
 
?>