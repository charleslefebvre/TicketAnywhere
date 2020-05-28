<?php
    session_start();

    $module = "statistiqueView.php";
    $content = array();
    array_push($content, $module);

    $title = "Statistique";
    $styles = array();
    array_push($styles,'statistique.css', 'pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>