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

    public function loadPurchase($userId){
        $TDG = PurchaseTDG::getInstance();
        $purchaseList = $TDG->get_purchase_by_user_ID($userId);

        if(count($purchaseList) == 0){
            echo "<h3>No result</h3>";
            return;
        }

        foreach($purchaseList as $purchase){
            echo "
            <div class='item'>
                <div class='info'>
                    <h6 class='title'>Purchase</h6>
                    <h8 class='id'>number: ".$purchase['id']."</h8>
                </div>
                <div class='info'>
                    <h6 class='date'>".$purchase['date']."<h6>
                </div>
                <div class='button-container'>
                    <form method='get' action='./receipt.php'>
                        <input type='hidden' name='purchaseId' value='".$purchase['id']."'/>
                        <button class='btn btn-primary trigger_popup_fricc'>Voir details</button>
                    </form>
                </div>
            </div>
            ";
        }
    }

    public function loadReceipt($purchaseId, $auditorium, $show){
        $TDG = PurchaseTDG::getInstance();
        $fullPurchaseInfo = $TDG->get_full_purchase_info_by_purchase_Id($purchaseId);
        $prixTotal = floatval(0);
        foreach($fullPurchaseInfo as $purchaseInfo){
            $prixTotal += intval($purchaseInfo['total']);
            $section = $auditorium->getSectionById($purchaseInfo['section_id']);
            $audi = $auditorium->getByRepresentationId($purchaseInfo['representation_id']);
            $s = $show->getByID($purchaseInfo['show_id']);

            echo "
            <h4 id='showName'>".$s['name']."</h4>
            <p id='date'>Date: ".$purchaseInfo['date']."</p>
            <p id='auditorium'>Auditorium: ".$audi['name']."</p>
            <p id='section'>Section: ".$section['color']."</p>
            <p id='ticketId'>ticket number: ".$purchaseInfo['ticket_id']."</p>
            <p id='total'>Prix: ".$purchaseInfo['total']."$</p>
            ";
        }
        //var_dump($prixTotal);
        echo " <hr color='black'>
        <p id='prixTotal'>Total: ".$prixTotal."$</p>
        ";
    }
}