<?php
    session_start();

    $module = "purchaseHistoryView.php";
    $content = array();
    array_push($content, $module);

    $title = "Purchase History";
    $styles = array();
    $script = "purchaseHistory.js";
    array_push($styles,'purchaseHistory.css', 'pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>