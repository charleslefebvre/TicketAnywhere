<?php

include_once __DIR__ . "/categoryTDG.php";

class Category
{
    private $id;
    private $description;

    public function __construct(){}

    public function getAll(){
        $TDG = CategoryTDG::getInstance();
        $list = $TDG->get_all();
        $TDG = null;
        return $list;
    }
}
?>