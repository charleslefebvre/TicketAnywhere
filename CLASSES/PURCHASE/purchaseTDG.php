<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class PurchaseTDG extends DBAO{

    private static $_instance = null;

    public function __construct(){
        parent::__construct();
    }
    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new PurchaseTDG();  
        }
        return self::$_instance;
    }

    public function add_purchase($clientId){
        try{
            $conn = $this->connect();
            $query = 'call addPurchase(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $clientId, PDO::PARAM_INT, 11);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
        catch(PDOException $e)
        {
           $result = null;
        }
        $conn = null;
        return $result;
    }

    public function add_real_purchase($ticketId, $purchaseId, $quantity, $total){
        try{
            $conn = $this->connect();
            $query = 'call addRealPurchase(?,?,?,?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $ticketId, PDO::PARAM_INT, 11);
            $stmt->bindParam(2, $purchaseId, PDO::PARAM_INT, 11);
            $stmt->bindParam(3, $quantity, PDO::PARAM_INT, 11);
            $stmt->bindParam(4, $total, PDO::PARAM_LOB);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
        catch(PDOException $e)
        {
           $result = null;
        }
        $conn = null;
        return $result;
    }

    public function add_ticket($representationId, $showId, $sectionId, $auditoriumId){
        try{
            $conn = $this->connect();
            $query = 'call addTicket(?,?,?,?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $representationId, PDO::PARAM_INT, 11);
            $stmt->bindParam(2, $showId, PDO::PARAM_INT, 11);
            $stmt->bindParam(3, $sectionId, PDO::PARAM_INT, 11);
            $stmt->bindParam(4, $auditoriumId, PDO::PARAM_INT, 11);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
        catch(PDOException $e)
        {
           $result = null;
        }
        $conn = null;
        return $result;
    }

    public function get_purchase_by_user_ID($userId){
        try{
            $conn = $this->connect();
            $query = 'call getPurchasesByUserId(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $userId, PDO::PARAM_INT, 11);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        catch(PDOException $e)
        {
           $result = null;
        }
        $conn = null;
        return $result;
    }

    public function get_full_purchase_info_by_purchase_Id($purchaseId){
        try{
            $conn = $this->connect();
            $query = 'call getPurchasesByUserId(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $purchaseId, PDO::PARAM_INT, 11);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        catch(PDOException $e)
        {
           $result = null;
        }
        $conn = null;
        return $result;
    }
}