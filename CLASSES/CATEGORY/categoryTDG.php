<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class CategoryTDG extends DBAO{

    private static $_instance = null;

    public function __construct(){
        parent::__construct();
    }
    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new CategoryTDG();  
        }
        return self::$_instance;
    }
    public function get_all(){
        try{
            $conn = $this->connect();
            $query = 'call getAllCategories';
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $result;
    }
}
?>