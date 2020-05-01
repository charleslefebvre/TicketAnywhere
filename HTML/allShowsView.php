<?php 
    include __DIR__ . "/../CLASSES/SHOW/show.php";   

?>

<div id="container">  
    <div id="list">
        <?php
            $show = new Show();
            $show->load_show($show->getAll());
        ?>
    </div>
</div>