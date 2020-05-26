<?php
    include_once __DIR__ . "/../CLASSES/SHOW/show.php";
    $showNewCount = $_POST['showNewCount'];
    $show = new Show();

    $show->display_all_shows($showNewCount);
?>