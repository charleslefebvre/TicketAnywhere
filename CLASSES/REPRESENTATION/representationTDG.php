<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class RepresentationTDG extends DBAO{

    private static $_instance = null;

    public function __construct(){
        parent::__construct();
    }
    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new RepresentationTDG();  
        }
        return self::$_instance;
    }

    public function get_by_show_ID($id){
        try{
            $conn = $this->connect();
            $query = 'call getRepresentationsByShowID(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
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