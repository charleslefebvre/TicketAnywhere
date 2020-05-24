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

    public function get_all($count){
        try{
            $conn = $this->connect();
            $query = 'call getAllShow(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $count, PDO::PARAM_INT);
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

    public function get_by_ID($id){
        try{
            $conn = $this->connect();
            $query = 'call getShowByID(?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
        catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $result;
    }

    public function get_by_artist($artistName,$count){
        try{
            $conn = $this->connect();
            $query = 'call getShowByArtistName(?,?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $artistName, PDO::PARAM_STR, 60);
            $stmt->bindParam(2, $count, PDO::PARAM_INT);
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

    public function get_by_auditorium($auditorium,$count){
        try{
            $conn = $this->connect();
            $query = 'call getShowByAuditorium(?,?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $auditorium, PDO::PARAM_STR, 60);
            $stmt->bindParam(2, $count, PDO::PARAM_INT);
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

    public function get_by_category($category,$count){
        try{
            $conn = $this->connect();
            $query = 'call getShowByCategory(?,?)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $category, PDO::PARAM_STR, 60);
            $stmt->bindParam(2, $count, PDO::PARAM_INT);
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
