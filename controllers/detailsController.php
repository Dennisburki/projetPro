<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');


$visitObj = new Destinations();


if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];

    $visit = $visitObj->getVisit($id)['des_visit'];

    $visitObj->incrementVisit($id, $visit);
}


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $detailsObj = new Destinations();
    $detailsArray = $detailsObj->getSingleDetails($id);

    $activitiesObj = new Destinations();
    $activitiesArray = $activitiesObj->getActivities($id);

    if (isset($_POST['wishlist'])) {


        $destinationId = $_POST['id'];
        $userId = $_SESSION['id'];

        $wishlistObj = new Destinations();
        $wishlistObj->addWishlist($destinationId, $userId);
    }
}
