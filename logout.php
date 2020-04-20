<<<<<<< HEAD
<?php
    session_start();

    $module = "../LOGIC/logout.logic.php";
    $content = array();
    array_push($content, $module);

    $title = "Logout";
    $styles = array();
    require_once __DIR__ . "/HTML/masterpage.php";
=======
<?php
    session_start();

    $module = "../LOGIC/logout.logic.php";
    $content = array();
    array_push($content, $module);

    $title = "Logout";
    $styles = array();
    require_once __DIR__ . "/HTML/masterpage.php";
>>>>>>> 670ebc6... Update
?>