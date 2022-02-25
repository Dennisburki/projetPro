<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');



$userId = $_SESSION['id'];

$displayObj = new Destinations();
$displayArray = $displayObj->getCarnet($userId);

if (isset($_POST['delete'])) {

    $id = $_GET['id'];

    $deleteObj = new Destinations();
    $deleteObj->deleteCarnet($id);

    header("Location: carnet.php");
}

