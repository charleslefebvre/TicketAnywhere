<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class UserTDG extends DBAO{

    private static $_instance = null;

    public function __construct(){
        parent::__construct();
    }
    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new UserTDG();  
        }
        return self::$_instance;
    }
    public function get_by_email($email){
        
        try{
            $conn = $this->connect();
            $query = 'call get_by_email(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $email, PDO::PARAM_STR, 50);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $result;
    }
    public function register($f_name, $l_name, $email, $address,$city,$zip,$pw){

        try{
            $conn = $this->connect();
            $query = 'call register(?,?,?,?,?,?,?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $f_name, PDO::PARAM_STR, 25);
            $stmt->bindParam(2, $l_name, PDO::PARAM_STR, 25);
            $stmt->bindParam(3, $email, PDO::PARAM_STR, 50);
            $stmt->bindParam(4, $address, PDO::PARAM_STR, 50);
            $stmt->bindParam(5, $city, PDO::PARAM_STR, 50);
            $stmt->bindParam(6, $zip, PDO::PARAM_STR, 6);
            $stmt->bindParam(7, $pw, PDO::PARAM_STR, 100);
            $stmt->execute();
            $resp = true;
        }
        catch(PDOException $e)
        {
           $resp = false;
        }
        $conn = null;
        return $resp;
    }
    
    public function get_by_id($id){
        
        try{
            $conn = $this->connect();
            $query = 'call get_by_id(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $id, PDO::PARAM_INT, 11);
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

    public function get_most_loyal_customer($amount){
        try{
            $conn = $this->connect();
            $query = 'call getMostLoyalCustomer(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $amount, PDO::PARAM_INT, 11);
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
