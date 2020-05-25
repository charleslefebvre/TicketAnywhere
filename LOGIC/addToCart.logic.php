<?php

session_start();

if(!isset($_SESSION['userID'])){
    header("Location: ../login.php");
    die();
}


if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}
$ticketInfos = $_POST;
$ticketInfos['numberOfTickets'] = 1;
if(in_array($ticketInfos,$_SESSION['panier'])){
    $index = array_search($ticketInfos,$_SESSION['panier']);
    $_SESSION['panier'][$index]['numberOfTickets'] += 1;
}
else{
    array_push($_SESSION['panier'], $ticketInfos);
}

header("Location: ../representations.php?showId=".$_POST['showId']);
$_SESSION['alertMessage'] = "Ticket has been added to your cart";
die();

?>