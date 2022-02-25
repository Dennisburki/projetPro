<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');


$visitObj = new Destinations();


//
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];

    //ici on recupere la valeur du compteur
    $visit = $visitObj->getVisit($id)['des_visit'];

    //on utilise la methode pour l'incrementer
    $visitObj->incrementVisit($id, $visit);
}


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $detailsObj = new Destinations();
    $detailsArray = $detailsObj->getSingleDetails($id);

    $activitiesObj = new Destinations();
    $activitiesArray = $activitiesObj->displayActivities($id);

    if (isset($_POST['wishlist'])) {


        $destinationId = $_POST['id'];
        $userId = $_SESSION['id'];

        $wishlistObj = new Destinations();
        $wishlistObj->addWishlist($destinationId, $userId);
    }
}
