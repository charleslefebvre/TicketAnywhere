<?php 
    include_once __DIR__ . "/../CLASSES/REPRESENTATION/representation.php";
    include_once __DIR__ . "/../CLASSES/SHOW/show.php";
    include_once __DIR__ . "/../CLASSES/AUDITORIUM/auditorium.php";
?>
<p id="title">My cart</p>

    <?php 
        if(isset($_SESSION['panier'])){
            echo "<div id='container'>";
            load_cart_items($_SESSION['panier'], new Show(), new Representation(), new Auditorium);
            echo "</div>";
            echo "<div id='buyContainer'>
                <button id='buy' class='btn btn-primary' onclick='window.location.href=`LOGIC/purchases.logic.php`'>Finalize purchases</button>
            </div>";
        }
        else
            echo "<h3 id='emptyCart'>Your cart is empty</h3>"
    ?>
