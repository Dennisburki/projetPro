<?php

if (session_status() == PHP_SESSION_NONE) session_start();


var_dump($_SESSION);

var_dump($_POST);


if(isset($_POST['disconnect'])) {
    session_unset();
    session_destroy();
    header('location: ../index.php');
}













?>