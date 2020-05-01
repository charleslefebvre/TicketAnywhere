<?php
    session_start();

    $module = "allShowsView.php";
    $content = array();
    array_push($content, $module);

    $title = "All Shows";
    $styles = array();
    $script = "searchResults.js";
    array_push($styles,'allShows.css');
    require_once __DIR__ . "/HTML/masterpage.php";
?>