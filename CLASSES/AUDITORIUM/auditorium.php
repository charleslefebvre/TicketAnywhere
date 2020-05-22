<?php

include_once __DIR__ . "/auditoriumTDG.php";

class Auditorium
{
    private $id;
    private $name;
    private $address;
    private $capacity;

    public function __construct(){}

    public function getAll(){
        $TDG = AuditoriumTDG::getInstance();
        $list = $TDG->get_all();
        $TDG = null;
        return $list;
    }
}
?>