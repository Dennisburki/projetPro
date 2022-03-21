<?php

require_once "../my-config.php";
require_once "../models/database.php";
require_once "../models/accounts.php";
require_once "../models/destination.php";

// $displayPostObj = new Accounts();
// $displayPostArray = $displayPostObj->getPost();

$displayPostObj = new Accounts();
$displayPostArray = $displayPostObj->getAllPosts();

// if (isset($_POST['validate'])) {

//     $switchObj = new Accounts();

//     foreach ($displayPostArray as $post) {
//         $id = $post['blo_id'];
//     }
//     $switchObj->switchModeration($id);

//     header("Location: moderation.php?validate=ok");
// }

if (isset($_POST['validate'])) {

    $id = $_GET['id'];
    $approveObj = new Accounts();
    $approveObj->switchModeration($id);
    header("Location: moderation.php?validate=ok");
}

if (isset($_POST['block'])) {

    $id = $_GET['id'];
    $blockObj = new Accounts();
    $blockObj->switchModerationBlock($id);
    header("Location: moderation.php?block=ok");
}

if (isset($_POST['delete'])) {

    $idPicture = $_GET['id'];
    $deleteObj = new Accounts();
    $getPictureObj = new Destinations();
    $getPictureArray = $getPictureObj->getBlogPictureName($idPicture);



    foreach ($displayPostArray as $post) {
        $id = $post['blo_id'];
    }
    foreach ($getPictureArray as $picture) {
        unlink("..\assets\img\img_blog/" . $picture['blo_picture']);
    }
    $deleteObj->deletePost($id);
    header("Location: moderation.php?delete=ok");
}
