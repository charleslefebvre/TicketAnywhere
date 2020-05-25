<?php 
    include_once __DIR__ . "/../CLASSES/REPRESENTATION/representation.php";
    include_once __DIR__ . "/../CLASSES/SHOW/show.php";
    include_once __DIR__ . "/../CLASSES/AUDITORIUM/auditorium.php";
?>
<div class="container">
    <?php var_dump($_SESSION) ?>
</div>
<p id="title">My cart</p>
<div id="container">
    <?php load_cart_items($_SESSION['panier'], new Show(), new Representation(), new Auditorium) ?>
</div>