<?php
    $_SESSION = array();
    unset($_COOKIE["PHPSESSID"]);
    session_destroy();
    header("Location: ./login.php");
    die();
?>