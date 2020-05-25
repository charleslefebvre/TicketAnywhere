<?php
    session_start();
    $newPrice = $_POST['newPrice'];
    $showId = $_POST['showId'];
    $representationId = $_POST['representationId'];

    $cart = $_SESSION['panier'];

    for($i = 0; $i < count($cart); ++$i){
        if($cart[$i]['showId'] == $showId && $cart[$i]['representationId'] == $representationId){
            $cart[$i]['price'] = $newPrice;
            echo $newPrice.'$';
            $_SESSION['panier'] = $cart;
            break;
        }
    }
?>