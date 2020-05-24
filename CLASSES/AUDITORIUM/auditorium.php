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

    public function getSections($id){
        $TDG = AuditoriumTDG::getInstance();
        $sections = $TDG->get_sections($id);
        $TDG = null;
        return $sections;
    }

    public function getSectionById($id){
        $TDG = AuditoriumTDG::getInstance();
        $section = $TDG->get_sections_by_ID($id);
        $TDG = null;
        return $section;
    }
}
?>