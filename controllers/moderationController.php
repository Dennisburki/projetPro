<?php

require_once "../my-config.php";
require_once "../models/database.php";
require_once "../models/accounts.php";

$displayPostObj = new Accounts();
$displayPostArray = $displayPostObj->getPost();

if(isset($_POST['validate'])){

    $switchObj = new Accounts();

    foreach($displayPostArray as $post){
        $id = $post['blo_id'];
    }
    $switchObj->switchModeration($id);

    header("Location: moderation.php?validate=ok");
}

if(isset($_POST['delete'])){

    $deleteObj = new Accounts();

    foreach($displayPostArray as $post){
        $id = $post['blo_id'];
    }
    $deleteObj->deletePost($id);
    header("Location: moderation.php?delete=ok");

}

