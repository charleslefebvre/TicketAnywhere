<?php
    include_once __DIR__ . "/../CLASSES/SHOW/show.php";
    $showNewCount = $_POST['showNewCount'];
    $tab = $_POST['tab'];
    $search = $_POST['query'];
    $show = new Show();

    $show->displayShow($tab, $search,$showNewCount);
?>