<?php

include_once __DIR__ . "/showTDG.php";
include_once __DIR__ . "/../CATEGORY/category.php";

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

    public function getByCategory($category,$count,$categoryId){
        $TDG = ShowTDG::getInstance();
        $list = $TDG->get_by_category($category,$count,$categoryId);
        $TDG = null;
        return $list;
    }
    public function displayShow($tab, $search,$count){
        if($tab == "categories"){
            $category = new Category();
            $categories = $category->getAll();
            foreach($categories as $item){
                $showList = $this->getByCategory($search,$count,$item['id']);
                echo "<h2 class='categories'>".$item['description']."</h2>";
                $this->load_show($showList);
            }     
        }
        else if($tab == "artists"){
            $showList = $this->getByArtist($search,$count);
            $this->load_show($showList);
        }
        else if($tab == "auditoriums"){
            $showList = $this->getByAuditorium($search,$count);
            $this->load_show($showList);

        }
        if(count($showList) < $count)
            echo "<script>
                    $('#moreShowsContainer').empty();
                    $('#moreShowsContainer').append('<p>No more show to display</p>')
                </script>";           
    }
    public function display_all_shows($count){
        $showList = $this->getAll($count);
        $this->load_show($showList);
        if(count($showList) < $count)
        echo "<script>
                $('#moreShowsContainer').empty();
                $('#moreShowsContainer').append('<p>No more show to display</p>')
            </script>";           
    }

    public function load_show($showList){
        if(count($showList) == 0){
            echo "<h3 class='noResult'>No search result</h3>
            <script>
            $(document).ready(() => {
                $('#moreShowsContainer').empty();
            })
            </script>";
            return;
        }
        for($i = 0; $i < count($showList); ++$i){
            if($i % 2 == 0)
                echo "<div class='row'>";
            echo "<div class='info-container'>
                <img class='imgShow' src='".$showList[$i]['imageURL']."' alt='show'>
                <div class='infos'>
                    <h6 class='title'>".$showList[$i]['name']."</h6>
                    <h6 class='artist'>".$showList[$i]['artist_name']."</h6>
                    <h6 class='category'>Category: ".$showList[$i]['category']."</h6>
                    <h6 class='auditorium'>Auditorium: ".$showList[$i]['auditorium_name']."</h6>
                    <h6 class='price'>Starting price: ".$showList[$i]['starting_price']. "$</h6>
                    </div>
                    <div class='button-container'>
                        <form method='get' action='./representations.php'>
                            <input type='hidden' name='showId' value='".$showList[$i]['id']."'/>
                            <button type='submit' class='btn btn-primary'>Details</button>   
                        </form>
                    </div>
                </div>";
            if($i % 2 != 0 || $i == count($showList) -1)
                echo "</div>";
        }
    }
}
