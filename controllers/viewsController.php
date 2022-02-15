<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $destinationDetailsObj = new Destinations();
    $destinationDetailsArray = $destinationDetailsObj->getDestinationDetails($id);

    $getCategoryTitleObj = new Destinations();
    $getCategoryTitleArray = $getCategoryTitleObj->getCategoryTitle($id);
}
