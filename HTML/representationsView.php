<?php
    include_once __DIR__ . "/../CLASSES/REPRESENTATION/representation.php";
?>
<p id="title">Name of the show</p>
<p id="subTitle">By Name of the Artist</p>
<div id="container">  
    <div id="list">
        <?php for($i = 0; $i < 5; ++$i):?>
        <div class='info-container'>
            <div class='infos'>
                <h6 class='title'></h6>
                <h6 class='audtitoriumN'>Auditorium's name</h6>
                <h6 class='audtitoriumA'>Auditorium's address</h6>
                <h6 class='date'>Date</h6>
                <h6 class='price'>Price range: X to X</h6>
            </div>
            <div class='button-container'>
                <button type='submit' class='btn btn-primary'>Buy</button>   
            </div>
        </div>
        <?php endfor;?>
    </div>
    <div id="moreRepresentationsContainer">
        <button id='moreRepresentations' class='btn btn-dark'>More</button>
    </div>
</div>