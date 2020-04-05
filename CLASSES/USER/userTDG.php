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
    public function register($f_name, $l_name, $email, $pw){

        try{
            $conn = $this->connect();
            $query = 'call register(?,?,?,?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $f_name, PDO::PARAM_STR, 25);
            $stmt->bindParam(2, $l_name, PDO::PARAM_STR, 25);
            $stmt->bindParam(3, $email, PDO::PARAM_STR, 50);
            $stmt->bindParam(4, $pw, PDO::PARAM_STR, 100);
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

}
