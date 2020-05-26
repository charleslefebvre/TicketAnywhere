<?php
    include_once __DIR__ . "/../CLASSES/SHOW/show.php";

    $show = new Show();
?>
<div id="header">
    <div id="container">
        <h1 class="display-1">Ticket Anywhere</h1>
        <p class="lead">An app to buy tickets for shows near your location</p>
    </div>
</div>

<div id="list">
    <?php $show->display_all_shows(6) ?>
</div>
<div id="moreShowsContainer">
        <button id='moreShows' class='btn btn-dark'>More</button>
</div>
