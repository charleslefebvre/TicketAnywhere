<?php
    session_start();
    
    $showId = $_POST['showId'];
    $representationId = $_POST['representationId'];

    $cart = $_SESSION['panier'];

    for($i = 0; $i < count($cart); ++$i){
        if($cart[$i]['showId'] == $showId && $cart[$i]['representationId'] == $representationId){
            unset($cart[$i]);            
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
    }
?>