<?php
function load_modules($moduleList){
    foreach($moduleList as $module => $moduleViewRef)
    {
    $path = __DIR__ . "/../HTML/$moduleViewRef";
    include $path;
    }
}
function load_styles($styleList){
    foreach($styleList as $style){
        echo "<link rel='stylesheet' href='STYLES/$style'>";
    }
}
function load_tabs(){
    if(isset($_GET['tab'])){         
        $query = filter_query();
        $tabSelected = $_GET['tab'];
        echo "<div id='tab-container'><a ";
        if($tabSelected == 'artists'){echo"id='selected-tab'";}echo"href='?tab=artists$query'>Artists</a><a ";
        if($tabSelected == 'auditoriums'){echo"id='selected-tab'";}echo"href='?tab=auditoriums$query'>Auditoriums</a><a ";
        if($tabSelected == 'categories'){echo"id='selected-tab'";}echo"href='?tab=categories".$query."'>Categories</a></div>"; 
    }
    else {
        $search = $_GET['search'];
        echo"
            <a id='selected-tab' href='?tab=artists&search=$search'>Artists</a>
            <a href='?tab=auditoriums&search=$search'>Auditoriums</a>
            <a href='?tab=categories&search=$search'>Categories</a>
        ";
    }
} 
function filter_query(){
    $string = "";
    $filter_query = $_GET;
    unset($filter_query['tab']);
    foreach($filter_query as $key => $value){
        $string .= "&$key=$value";
    }
    return $string;
}
function load_select_options($list,$value){
    foreach($list as $item){
        echo "<option value=".strtolower($item['id']).">".$item[$value]."</option>";
    }
}

function load_cart_items($array, $Show, $Representation, $Auditorium){
    foreach($array as $item){
        $currentShow = $Show->getByID($item['showId']);
        $currentRepresentation = $Representation->getByID($item['representationId']);
        $currentSection = $Auditorium->getSectionById($item['section']);
        $numberOfTickets = $item['numberOfTickets'];
        $id = $item['showId'].'ticket'.$item['representationId'];
        echo "
        <div class='item' id='$id'>
            <img id='xIMG' src='IMG/plus.png'/>
            <img src='".$currentShow['imageURL']."' class='imgShow' alt='show'>
            <div class='show-info'>
                <p>".$currentShow['name']."</p>
                <p>Auditorium: ".$currentRepresentation['name']."</p>
                <p>Section: ".$currentSection['color']."</p>
            </div>
            <div class='price-info'>
                <img id='plusIMG' src='IMG/plus.png' />
                <p id='$id'>$numberOfTickets</p>
                <img id='minusIMG' src='IMG/minus.png'/>
                <p id='price$id'>".$item['price']."$</p>
            </div>

        </div>
        ";
    }
}
?>

