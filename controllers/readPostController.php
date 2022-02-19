<?php

require_once "../my-config.php";
require_once "../models/database.php";
require_once "../models/accounts.php";

if(isset($_POST['read'])){

    $id = $_GET['id'];
    $readObj = new Accounts();
    $readArray = $readObj->getApprouvedPostById($id);



}