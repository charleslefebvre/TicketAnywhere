<?php
    session_start();

    $module = "representationsView.php";
    $content = array();
    array_push($content, $module);

    $title = "Representations";
    $styles = array();
    array_push($styles,'representations.css','pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>