<?php

require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');

$uploaddir = "..\assets\img\img_destinations/";
var_dump($_FILES);

if (!empty($_FILES['picture']['name'])) {
    $fileName = $_FILES['picture']['tmp_name'];
    $extension = explode('.', $_FILES['picture']['name']); // utiliser le mime type plutot que l'explode
    $uploadfile = $uploaddir . uniqid() . '.' . end($extension); // faudra changer ici aussi

    $fileToUpload = explode('/', $uploadfile);
    $fileToUpload = end($fileToUpload);
}

if (!empty($_FILES['picture']['name'])) {
    move_uploaded_file($fileName, $uploadfile);
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $getSingleObj = new Destinations();
    $getSingleArray = $getSingleObj->getSelectedDestination($id);

    $destinationObj = new Destinations();
    $destinationArray = $destinationObj->getCategories();
}

if (isset($_POST['updateDestination'])) {

    if (empty($_FILES['picture']['name'])) {

        $title = $_POST['title'];
        $descr = $_POST['content'];
        $cityCode = $_POST['cityCode'];
        $iframe = $_POST['iframe'];
        $category = $_POST['category'];
        $id = $_GET['id'];

        $updateObj = new Destinations();
        $updateObj->updateDestinationNoPicture($title, $descr, $cityCode, $iframe, $category, $id);
    }

    if (!empty($_FILES['picture']['name'])) {

        $id = $_GET['id'];

        //Pour supprimer l'image dans le dossier
        $getPictureObj = new Destinations();
        $getPictureArray = $getPictureObj->getPictureName($id);
        foreach ($getPictureArray as $picture) {
            unlink("..\assets\img\img_destinations/" . $picture['des_picture']);
        }

        $title = $_POST['title'];
        $descr = $_POST['content'];
        $cityCode = $_POST['cityCode'];
        $iframe = $_POST['iframe'];
        $category = $_POST['category'];

        $picture = $fileToUpload;

        $updateObj = new Destinations();
        $updateObj->updateDestinationWithPicture($title, $descr, $cityCode, $iframe, $category, $id, $picture);
    }
}
