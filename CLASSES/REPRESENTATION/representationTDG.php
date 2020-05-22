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
}
?>