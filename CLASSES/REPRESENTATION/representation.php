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

    public function display($representationList, $auditorium, $show){
        if(!empty($representationList)){
            foreach($representationList as $representation){
                $sections = $auditorium->getSections($representation['id_auditorium']);
                echo "
                <div class='info-container'>
                        <div class='container-fluid'>
                        <form method='post' action='./LOGIC/addToCart.logic.php'>
                            <div class='row'>
                                <div class='col-sm'>
                                    <h6 class='title'></h6>
                                    <h5 class='audtitoriumN'>".$representation['name']."</h5>
                                    <h6 class='audtitoriumA'>Address: ".$representation['address']."</h6>
                                    <h6 class='date'>Date: ".$representation['date']."</h6>
                                    <h6 class='price'>Price: ".$show['starting_price'] * $sections[0]['mp_price']."$</h6>
                                </div>
                                <div class='col-sm'>
                                    <select name='section' class='custom-select select'>";
                
                load_select_options($sections, 'color');
    
                echo "              </select>
                                </div>
                                <div class='button-container'>
                                    <input type='hidden' name='showId' value='".$show['id']."'/>
                                    <input type='hidden' name='representationId' value='".$representation['id']."'/>
                                    <button type='submit' class='btn btn-primary'>Buy</button>
                                </div>
                            </div>
                        </form>
                        </div>
                </div>
                ";
            } 
        } else {
            echo "
            <p>There is no representation for this show</p>
            ";
        }
    }
}
?>