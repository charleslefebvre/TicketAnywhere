<?php
include_once __DIR__ . "/../CLASSES/REPRESENTATION/representation.php";
include_once __DIR__ . "/../CLASSES/SHOW/show.php";
include_once __DIR__ . "/../CLASSES/AUDITORIUM/auditorium.php";
include_once __DIR__ . "/../CLASSES/PURCHASE/purchase.php";

session_start();
$panier = $_SESSION['panier'];
$auditorium = new Auditorium();

// AJOUT À LA BD
$purchase = new Purchase();
$idPurchase = $purchase->addPurchase($_SESSION['userID']);
foreach($panier as $item){
    $auditoriumId = $auditorium->getByRepresentationId(intval($item['representationId']))['id'];

    $idTicket = $purchase->addTicket(intval($item['representationId']), intval($item['showId']), intval($item['section']), $auditoriumId);
    $idRealPurchase = $purchase->addRealPurchase(intval($idTicket['id']), intval($idPurchase['id']), intval($item['numberOfTickets']), $item['price']);
}

// ENVOIE DU EMAIL

// SUPPRIMER $_SESSION['panier']
unset($_SESSION['panier']);

// REDIRECTION
header("Location: ../index.php");
die();

?>