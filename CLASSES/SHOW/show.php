<?php

include_once __DIR__ . "/showTDG.php";

class Show
{
    private $id;
    private $name;
    private $description;
    private $categoryId;
    private $startingPrice;
    private $artistName;
    private $imageURL;

    public function __construct(){}

    public function addShow($name, $description, $categoryId, $price, $artist, $url){
        $TDG = ShowTDG::getInstance();
        $resp = $TDG->add_show($name, $description, $categoryId, $price, $artist, $url);
        $TDG = null;
        return $resp;
    }

    public function getAll($count){
        $TDG = ShowTDG::getInstance();
        $list = $TDG->get_all($count);
        $TDG = null;
        return $list;
    }

    public function getByID($id){
        $TDG = ShowTDG::getInstance();
        $show = $TDG->get_by_ID($id);
        $TDG = null;
        return $show;
    }

    public function getByArtist($artistName,$count){
        $TDG = ShowTDG::getInstance();
        $list = $TDG->get_by_artist($artistName,$count);
        $TDG = null;
        return $list;
    }

    public function getByAuditorium($auditorium,$count){
        $TDG = ShowTDG::getInstance();
        $list = $TDG->get_by_auditorium($auditorium,$count);
        $TDG = null;
        return $list;
    }

    public function getByCategory($category,$count){
        $TDG = ShowTDG::getInstance();
        $list = $TDG->get_by_category($category,$count);
        $TDG = null;
        return $list;
    }
    public function displayShow($tab, $search,$count){
        if($search == ""){
            $showList = $this->getAll($count);
        } 
        else {
            if($tab == "artists"){
                $showList = $this->getByArtist($search,$count);
            } else if($tab == "auditoriums"){
                $showList = $this->getByAuditorium($search,$count);
            } else if($tab == "categories"){
                $showList = $this->getByCategory($search,$count);
            }
        }
        if(count($showList) < $count)
            echo "<script>
                    $('#moreShowsContainer').empty();
                    $('#moreShowsContainer').append('<p>No more show to display</p>')
                </script>";    
        $this->load_show($showList);
    }

    public function load_show($showList){
        if(count($showList) == 0){
            echo "<h3>No search result</h3>
            <script>
            $(document).ready(() => {
                $('#moreShowsContainer').empty();
            })
            </script>";
            return;
        }
        foreach($showList as $show){
            echo "<div class='info-container'>
                <img src='".$show['imageURL']."' height='50' alt='show'>
                <div class='infos'>
                    <h6 class='title'>".$show['name']."</h6>
                    <h6 class='artist'>".$show['artist_name']."</h6>
                    <h6 class='category'>Category: ".$show['category']."</h6>
                    <h6 class='price'>Starting price: ".$show['starting_price']. "$</h6>
                    <h6 class='ticket'>X tickets left</h6>
                    </div>
                    <div class='button-container'>
                        <form method='get' action='./representations.php'>
                            <input type='hidden' name='showId' value='".$show['id']."'/>
                            <button type='submit' class='btn btn-primary'>Buy</button>   
                        </form>
                    </div>
                </div>";
        }
    }
}
