<?php

require_once "../my-config.php";
require_once "../models/database.php";
require_once "../models/accounts.php";


$uploaddir = "..\assets\img\img_blog/";

if (isset($_FILES['upload'])) {
    $fileName = $_FILES['upload']['tmp_name'];
    $extension = explode('.', $_FILES['upload']['name']); // utiliser le mime type plutot que l'explode
    $uploadfile = $uploaddir . uniqid() . '.' . end($extension); // faudra changer ici aussi

    $fileToUpload = explode('/', $uploadfile);
    $fileToUpload = end($fileToUpload);
}


if (!empty($_FILES)) {
    move_uploaded_file($fileName, $uploadfile);
}



if (isset($_POST['publish'])) {

    if (!empty($_FILES['upload']['name'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $pictureName = $fileToUpload;
        $id = $_SESSION['id'];

        $publishObj = new Accounts();
        $publishObj->addPost($title, $content, $pictureName, $id);

    } else {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = $_SESSION['id'];

        $publishObj = new Accounts();
        $publishObj->addPost($title, $content, $pictureName, $id);
        
    }
}
