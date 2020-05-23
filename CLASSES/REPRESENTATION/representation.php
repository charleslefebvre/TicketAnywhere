<?php

include_once __DIR__ . "/representationTDG.php";

class Representation
{
    private $id;
    private $showId;
    private $date;
    private $auditoriumId;

    public function __construct(){}

    public function GetByShowID($id){
        $TDG = RepresentationTDG::getInstance();
        $representation = $TDG->get_by_show_ID($id);
        $TDG = null;
        return $representation;
    }

    public function display($representationList, $auditorium){
        foreach($representationList as $representation){
            $sections = $auditorium->getSections($representation['id']);
            echo "
            <div class='info-container'>
            <div class='infos'>
                <h6 class='title'></h6>
                <h6 class='audtitoriumN'>".$representation['name']."</h6>
                <h6 class='audtitoriumA'>".$representation['address']."</h6>
                <h6 class='date'>".$representation['date']."</h6>
                <h6 class='price'>Price range: X to X</h6>
            </div>
            <div class='infos'>
            <select name='section' class='custom-select'>".load_select_options($sections, 'color')."</section>
            </div>
            <div class='button-container'>
                <button type='submit' class='btn btn-primary'>Buy</button>   
            </div>
            </div>
            ";
        }
    }
}
?>