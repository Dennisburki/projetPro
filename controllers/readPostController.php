<?php

require_once "../my-config.php";
require_once "../models/database.php";
require_once "../models/accounts.php";
require_once "../models/destination.php";


$idObj = new Destinations();

if ($idObj->checkBlogId($_GET['id']) == FALSE) {
    header("Location: ../404.php");
}


if(isset($_POST['read'])){

    $id = $_GET['id'];
    $readObj = new Accounts();
    $readArray = $readObj->getApprouvedPostById($id);

} else {
    header("Location: admin.php");
}