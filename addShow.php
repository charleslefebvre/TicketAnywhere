<?php
    session_start();

    $module = "addShowView.php";
    $content = array();
    array_push($content, $module);

    $title = "New show";
    $styles = array();
    $script = "addShow.js";
    array_push($styles,'addShow.css','form.css','pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>