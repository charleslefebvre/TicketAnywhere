<?php
    session_start();

    $module = "cartView.php";
    $content = array();
    array_push($content, $module);

    $title = "Cart";
    $styles = array();
    $script = "cart.js";
    array_push($styles,'cart.css', 'pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>