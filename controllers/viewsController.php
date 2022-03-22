<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');
require_once('../models/accounts.php');


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $destinationDetailsObj = new Destinations();
    $destinationDetailsArray = $destinationDetailsObj->getDestinationDetails($id);

    $getCategoryTitleObj = new Destinations();
    $getCategoryTitleArray = $getCategoryTitleObj->getCategoryTitle($id);

    if (isset($_POST['wishlist'])) {


        $destinationId = $_POST['id'];
        $userId = $_SESSION['id'];

        $wishlistObj = new Destinations();
        $wishlistObj->addWishlist($destinationId, $userId);
    }
    if (isset($_POST['carnet'])) {


        $destinationId = $_POST['id'];
        $userId = $_SESSION['id'];

        $wishlistObj = new Destinations();
        $wishlistObj->addCarnet($destinationId, $userId);
    }


    $showActivitiesObj = new Destinations();
}

if ($_GET['id'] >= 7) {
    header('Location: 404.php');
    exit();
}
