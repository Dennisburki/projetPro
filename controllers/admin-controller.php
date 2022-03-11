<?php


if(isset($_POST['disconnect'])) {
    session_unset();
    if (session_status() !== PHP_SESSION_NONE){
        session_destroy();
    }
    $_SESSION['login'] = "";
    $_SESSION['name'] = "";
    $_SESSION['role'] = "";
}













?>