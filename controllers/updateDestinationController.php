<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');


$displayObj = new Destinations();
$displayArray = $displayObj->getDestinations();

$destinationObj = new Destinations();
$destinationArray = $destinationObj->getCategories();

if (!empty($_POST['category'])) {

    $category = $_POST['category'];

    $sortedObj = new Destinations();
    $sortedArray = $sortedObj->getSortedDestinations($category);
}

if (isset($_POST['delete'])) {

    $id = $_GET['id'];

    $getPictureObj = new Destinations();
    $getPictureArray = $getPictureObj->getPictureName($id);
    foreach ($getPictureArray as $picture) {
        unlink("..\assets\img\img_destinations/" . $picture['des_picture']);
    }

    $deleteObj = new Destinations();
    $deleteObj->deleteDestination($id);
}
