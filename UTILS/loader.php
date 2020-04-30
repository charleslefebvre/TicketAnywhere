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
function load_category_checkbox($checkboxList){
    
    foreach($checkboxList as $checkbox){

        echo "<div class='form-check'>
                <input class='form-check-input' type='checkbox' name='".strtolower($checkbox)."'value='".strtolower($checkbox)."'";
        if(isset($_GET[strtolower($checkbox)])){
            echo "checked";
        } 
        
        echo"><label class='form-check-label' for=".strtolower($checkbox)."'>
            $checkbox
        </label>
        </div>";
    }
}
?>

