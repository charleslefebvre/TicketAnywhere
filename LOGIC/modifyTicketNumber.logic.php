<?php
    session_start();
    $numberOfTickets = $_POST['ticketsNewCount'];
    $showId = $_POST['showId'];
    $representationId = $_POST['representationId'];

    $cart = $_SESSION['panier'];
    for($i = 0; $i < count($cart); ++$i){
        if($cart[$i]['showId'] == $showId && $cart[$i]['representationId'] == $representationId){
            $cart[$i]['numberOfTickets'] = $numberOfTickets;
            echo $numberOfTickets;
            $_SESSION['panier'] = $cart;
            break;
        }
    }
?>