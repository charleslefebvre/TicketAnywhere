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
    if(isset($_SESSION['tab'])){         
        $query = filter_query();
        $tabSelected = $_SESSION['tab'];
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
function load_category_checkbox($checkboxList,$value){
    
    foreach($checkboxList as $checkbox){
        $name = strtolower($checkbox[$value]);
        echo "<div class='form-check'>
                <input class='form-check-input' type='checkbox' name='$name'value='".$checkbox['id']."'";
        if(isset($_GET[$name])){
            echo "checked";
        } 
        
        echo"><label class='form-check-label' for='$name'>".
            $checkbox[$value]."
        </label>
        </div>";
    }
}
function load_select_options($list,$value){
    foreach($list as $item){
        echo "<option value=".strtolower($item['id']).">".$item[$value]."</option>";
    }
}

function load_cart_items($array, $Show, $Representation, $Auditorium){
    $counter = 1;
    foreach($array as $item){
        $currentShow = $Show->getByID($item['showId']);
        $currentRepresentation = $Representation->getByID($item['representationId']);
        $currentSection = $Auditorium->getSectionById($item['section']);
        $numberOfTickets = $item['numberOfTickets'];
        echo "
        <div class='item'>
            <img src='".$currentShow['imageURL']."' height='50' alt='show'>
            <div class='show-info'>
                <p>".$currentShow['name']."</p>
                <p>Auditorium: ".$currentRepresentation['name']."</p>
                <p>Section: ".$currentSection['color']."</p>
            </div>
            <img id='plusIMG' src='IMG/plus.png' height='50'/>
            <p id='$counter'>$numberOfTickets</p>
            <img id='minusIMG' src='IMG/minus.png' height='50'/>
            <p>Total price $</p>
        </div>
        ";
        $counter++;
    }
}
?>

