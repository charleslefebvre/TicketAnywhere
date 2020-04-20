<?php
    session_start();

    $module = "aboutView.php";
    $content = array();
    array_push($content, $module);

    $title = "About";
    $styles = array();
    array_push($styles,'about.css','pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>

