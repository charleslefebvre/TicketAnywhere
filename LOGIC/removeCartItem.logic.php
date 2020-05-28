<?php
    session_start();
    include_once __DIR__ . "/../UTILS/loader.php";
    include_once "../CLASSES/SHOW/show.php";
    include_once "../CLASSES/REPRESENTATION/representation.php";
    include_once "../CLASSES/AUDITORIUM/auditorium.php";

    $showId = $_POST['showId'];
    $representationId = $_POST['representationId'];

    $cart = array();

    foreach($_SESSION['panier'] as $item){
        if($item['showId'] == $showId && $item['representationId'] == $representationId){         
            $_SESSION['panier'] = $cart;
            if(count($_SESSION['panier']) == 0){
                echo "<h3 id='emptyCart'>Your cart is empty</h3>
                <script> $('#buyContainer').empty();</script>";
                unset($_SESSION['panier']);
            }
            else{
                echo "<div id='container'>";
                load_cart_items($_SESSION['panier'], new Show(), new Representation(), new Auditorium);
                echo "</div>";
            }
            break;
        }
        array_push($cart,$item);
    }
?>