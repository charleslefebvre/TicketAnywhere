<<<<<<< HEAD
<?php
    session_start();

    $module = "registerView.php";
    $content = array();
    array_push($content, $module);

    $title = "Register";
    $styles = array();
    $script = "register.js";
    array_push($styles,'form.css','pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
=======
<?php
    session_start();

    $module = "registerView.php";
    $content = array();
    array_push($content, $module);

    $title = "Register";
    $styles = array();
    $script = "register.js";
    array_push($styles,'form.css','pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
>>>>>>> 670ebc6... Update
?>