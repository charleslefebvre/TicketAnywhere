<?php
    session_start();

    $module = "indexView.php";
    $content = array();
    array_push($content, $module);

    $title = "Ticket Anywhere";
    $styles = array();
    $script = 'index.js';
    array_push($styles,'index.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>