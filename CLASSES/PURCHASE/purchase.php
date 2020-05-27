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
            // Liste contenant tous les informations nécéssaire pour afficher le contenu de la facture
            $fullPurchaseInfo = $TDG->get_full_purchase_info_by_purchase_Id($purchase['id']);
            echo "
            <div class='item'>
                <div class='info'>
                    <h6 class='title'>Achat<h6>
                </div>
                <div class='info'>
                    <h6 class='date'>".$purchase['date']."<h6>
                </div>
                <div class='button-container'>
                    <form method='get' action=''>
                        <input type='hidden' name='purchaseId' value='".$purchase['id']."'/>
                        <button type='submit' class='btn btn-primary'>Voir details</button>   
                    </form>
                </div>
            </div>
            ";
        }
    }
}