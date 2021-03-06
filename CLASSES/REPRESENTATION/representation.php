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

    public function getByID($id){
        $TDG = RepresentationTDG::getInstance();
        $representation = $TDG->get_by_ID($id);
        $TDG = null;
        return $representation;
    }

    public function addRepresentation($showId, $date, $auditoriumId){
        $TDG = RepresentationTDG::getInstance();
        $resp = $TDG->add_representation($showId, $date, $auditoriumId);
        $TDG = null;
        return $resp;
    }

    public function display($representationList, $auditorium, $show){
        if(!empty($representationList)){
            $counter = 0;
            foreach($representationList as $representation){
                $sections = $auditorium->getSections($representation['id_auditorium']);
                echo "
                <div class='info-container'>
                        <div class='container-fluid'>
                        <form method='post' action='./LOGIC/addToCart.logic.php'>
                            <div class='row'>
                                <div id='$counter' class='col-sm'>
                                    <h6 class='title'></h6>
                                    <h5 class='audtitoriumN'>".$representation['name']."</h5>
                                    <h6 class='audtitoriumA'>Address: ".$representation['address']."</h6>
                                    <h6 class='date'>Date: ".$representation['date']."</h6>
                                    <h6 id='price$counter'>Price: ".$show['starting_price'] * $sections[0]['mp_price']."$</h6>
                                </div>
                                <div class='col-sm'>
                                <select name='section' class='custom-select select'>";            
                                load_representation_sections($sections,$show['starting_price']);
                        echo "</select>
                                </div>
                                <div class='button-container'>
                                    <input type='hidden' name='showId' value='".$show['id']."'/>
                                    <input type='hidden' name='representationId' value='".$representation['id']."'/>
                                    <input id='hidden$counter' type='hidden' name='price' value='".$show['starting_price'] * $sections[0]['mp_price']."'/>
                                    <button type='submit' class='btn btn-primary'>Buy</button>
                                </div>
                            </div>
                        </form>
                        </div>
                </div>
                ";
                $counter++;
            } 
        } else {
            echo "
            <p>There is no representation for this show</p>
            ";
        }
    }
}
?>