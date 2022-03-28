<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');


$uploaddir = "..\assets\img\img_destinations/";






if (isset($_FILES['picture'])) {
    $fileName = $_FILES['picture']['tmp_name'];
    $extension = explode('.', $_FILES['picture']['name']);
    $uploadfile = $uploaddir . uniqid() . '.' . end($extension);

    $fileToUpload = explode('/', $uploadfile);
    $fileToUpload = end($fileToUpload);
}


if (!empty($_FILES)) {
    move_uploaded_file($fileName, $uploadfile);
}

$destinationObj = new Destinations();
$destinationArray = $destinationObj->getCategories();

$activitiesObj = new Destinations();
$activitiesArray = $activitiesObj->getAllActivities();


$regexIframe = "/^(<iframe src=\"https:\/\/www\.google\.com\/maps\/embed\?pb=).+(<\/iframe>)$/";

if (isset($_POST['addDestination'])) {

    $arrayErrors = [];

    if (!preg_match($regexIframe, $_POST['iframe'])) {
        $arrayErrors["wrongIframe"] = "Iframe invalide";
    }
    if (empty($_POST['title'])) {
        $arrayErrors['noTitle'] = "Veuillez renseigner un titre de destination.";
    }
    $titleObj = new Destinations();
    if ($titleObj->getDestinationTitle($_POST['title']) !== FALSE) {
        $arrayErrors['titleExists'] = "Cette destination existe déjà.";
    }
    if (empty($_POST['content'])) {
        $arrayErrors['noContent'] = "Veuillez écrire une description.";
    }
    if (empty($_POST['cityCode'])) {
        $arrayErrors['noCode'] = "Veuillez saisir le city code pour la météo.";
    }
    if (empty($_POST['iframe'])) {
        $arrayErrors['noIframe'] = "Veuillez renseigner une iframe.";
    }
    if (!isset($_POST['category'])) {
        $arrayErrors['noCategory'] = "Veuillez sélectionner une catégorie.";
    }
    if (empty($_FILES['picture']['name'])) {
        $arrayErrors['noPicture'] = "Veuillez ajouter une image.";
    }
    if (empty($arrayErrors)) {
        $picture = $fileToUpload;
        $title = htmlspecialchars($_POST['title']);
        $descr = htmlspecialchars($_POST['content']);
        $cityCode = htmlspecialchars($_POST['cityCode']);
        $iframe = strip_tags($_POST['iframe'], "<iframe>");
        $category = $_POST['category'];

        $addObj = new Destinations();
        $addArray = $addObj->addDestination($picture, $title, $descr, $cityCode, $iframe, $category);


        foreach ($activitiesArray as $catch) {

            if (isset($_POST[$catch['act_id']])) {

                $activity = $catch['act_name'];

                $selectedObj = new Destinations();
                $selectedObj->addActivities($activity);
            }
        }
        $page = $_SERVER['PHP_SELF'];
        $sec = "3";
        header("Refresh: $sec; url=$page");
    }
}
