<?php
    session_start();

    $module = "receiptView.php";
    $content = array();
    array_push($content, $module);

    $title = "Receipt";
    $styles = array();
    array_push($styles,'receipt.css', 'pageFormat.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>