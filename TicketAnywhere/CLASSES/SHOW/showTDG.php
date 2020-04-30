<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class ShowTDG extends DBAO{

    private static $_instance = null;

    public function __construct(){
        parent::__construct();
    }
    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new ShowTDG();  
        }
        return self::$_instance;
    }

    public function get_all(){

        try{
            $conn = $this->connect();
            $query = 'call getAllShow()';
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

    public function get_by_artist($artistName){
        try{
            $conn = $this->connect();
            $query = 'call getShowByArtistName(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $artistName, PDO::PARAM_STR, 60);
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

    public function get_by_auditorium($auditorium){
        try{
            $conn = $this->connect();
            $query = 'call getShowByAuditorium(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $auditorium, PDO::PARAM_STR, 60);
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

    public function get_by_category($category){
        try{
            $conn = $this->connect();
            $query = 'call getShowByCategory(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $category, PDO::PARAM_STR, 60);
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
