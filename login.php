<?php
    session_start();

    $module = "loginView.php";
    $content = array();
    array_push($content, $module);

    $title = "Login";
    $styles = array();
    array_push($styles,'form.css','pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>