<?php

session_start();

if(!isset($_SESSION['userID'])){
    header("Location: ../representations.php?showId=".$_POST['showId']);
    $message = "TEST";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}

array_push($_SESSION['panier'], $_POST);

header("Location: ../representations.php?showId=".$_POST['showId']);
die();

?>