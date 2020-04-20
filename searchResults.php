<<<<<<< HEAD
<?php
    session_start();

    $module = "searchResultsView.php";
    $content = array();
    array_push($content, $module);

    $title = "Results";
    $styles = array();
    $script = "searchResults.js";
    array_push($styles,'searchResults.css');
    require_once __DIR__ . "/HTML/masterpage.php";
=======
<?php
    session_start();

    $module = "searchResultsView.php";
    $content = array();
    array_push($content, $module);

    $title = "Results";
    $styles = array();
    $script = "searchResults.js";
    array_push($styles,'searchResults.css');
    require_once __DIR__ . "/HTML/masterpage.php";
>>>>>>> 670ebc6... Update
?>