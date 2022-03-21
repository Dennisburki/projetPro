<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/accounts.php');
require_once('../models/destination.php');

$allUsersObj = new Accounts();
$allUsersArray = $allUsersObj->getAllUsers();

$countUsersObj = new Accounts();
$countArray = $countUsersObj->getUsersQuantity();

if (isset($_POST['approve'])) {

    $id = $_GET['id'];
    $approveObj = new Accounts();
    $approveObj->approveUserStatus($id);
}

if (isset($_POST['block'])) {

    $id = $_GET['id'];
    $blockObj = new Accounts();
    $blockObj->blockUserStatus($id);
}

if (isset($_POST['delete'])) {

    $id = $_GET['id'];



    $deleteWishlistObj = new Accounts();
    $deleteWishlistObj->deleteUsersWishlist($id);

    $deleteCarnetObj = new Accounts();
    $deleteCarnetObj->deleteUsersCarnet($id);


    $deleteBlogObj = new Accounts();
    $deleteBlogObj->deleteUsersPost($id);

    $deleteObj = new Accounts();
    $deleteObj->deleteUser($id);
}

if (isset($_GET['id'])) {
    header("Location: usersManagement.php");
}
