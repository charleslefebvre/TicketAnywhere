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

    public function getAll($count){
        $TDG = ShowTDG::getInstance();
        $list = $TDG->get_all($count);
        $TDG = null;
        return $list;
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
            echo "<h3>No search result</h3>";
            return;
        }
        foreach($showList as $show){
            echo "<div class='info-container'>
                <img src='".$show['imageURL']."' height='50' alt='show'>
                <div class='infos'>
                    <h6 class='title'>".$show['name']."</h6>
                    <h6 class='artist'>".$show['artist_name']."</h6>
                    <h6 class='category'>Category: ".$show['category']."</h6>
                    <h6 class='price'>".$show['starting_price']. "$</h6>
                    <h6 class='ticket'>X tickets left</h6>
                    </div>
                    <div class='button-container'>
                    <button class='btn btn-primary'>Buy</button>    
                    </div>
                </div>";
        }
    }
}
