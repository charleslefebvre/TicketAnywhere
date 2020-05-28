<?php

include_once __DIR__ . "/../CLASSES/AUDITORIUM/auditorium.php";
include_once __DIR__ . "/../CLASSES/PURCHASE/purchase.php";

session_start();
$panier = $_SESSION['panier'];
$auditorium = new Auditorium();

$purchase = new Purchase();
$idPurchase = $purchase->addPurchase($_SESSION['userID']);
foreach($panier as $item){
    $auditoriumId = $auditorium->getByRepresentationId(intval($item['representationId']))['id'];

    $idTicket = $purchase->addTicket(intval($item['representationId']), intval($item['showId']), intval($item['section']), $auditoriumId);
    $idRealPurchase = $purchase->addRealPurchase(intval($idTicket['id']), intval($idPurchase['id']), intval($item['numberOfTickets']), $item['price']);
}

unset($_SESSION['panier']);

header("Location: ../index.php");
die();

?>
