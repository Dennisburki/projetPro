<?php

if (session_status() == PHP_SESSION_NONE) session_start();

if(isset($_POST['disconnect'])) {
    session_unset();
    session_destroy();
    header('location: ../index.php');
    $_SESSION['login'] = "";
}













?>