<?php

include_once __DIR__ . "/purchaseTDG.php";

class Purchase
{
    public function __construct(){}

    public function addPurchase($clientId){
        $TDG = PurchaseTDG::getInstance();
        $res = $TDG->add_purchase($clientId);
        $TDG = null;
        return $res;
    }

    public function addRealPurchase($ticketId, $purchaseId, $quantity, $total){
        $TDG = PurchaseTDG::getInstance();
        $res = $TDG->add_real_purchase($ticketId, $purchaseId, $quantity, $total);
        $TDG = null;
        return $res;
    }

    public function addTicket($representationId, $showId, $sectionId, $auditoriumId){
        $TDG = PurchaseTDG::getInstance();
        $res = $TDG->add_ticket($representationId, $showId, $sectionId, $auditoriumId);
        $TDG = null;
        return $res;
    }
}