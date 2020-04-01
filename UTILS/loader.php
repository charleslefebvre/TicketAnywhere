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
    echo "<div id='tab-container'>";
        if(isset($_GET['tab'])){         
            $query = filter_query();
            $tabSelected = $_GET['tab'];
            echo "<div id='tab-container'><a ";
            if($tabSelected == 'artists'){echo"id='selected-tab'";}echo"href='?tab=artists$query'>Artists</a><a ";
            if($tabSelected == 'auditoriums'){echo"id='selected-tab'";}echo"href='?tab=auditoriums$query'>Auditoriums</a><a ";
            if($tabSelected == 'categories'){echo"id='selected-tab'";}echo"href='?tab=categories".$query."'>Categories</a></div>"; 
        }
        else {
            echo"
                <a id='selected-tab' href='?tab=artists'>Artists</a>
                <a href='?tab=auditoriums'>Auditoriums</a>
                <a href='?tab=categories'>Categories</a>
            ";
        }
        echo "</div>";
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
function load_category_options($optionList){
    $category_selected = (!isset($_GET['category'])?'any':$_GET['category']);
    foreach($optionList as $option){
        echo" <option ";
        if(strtolower($option) == $category_selected){
            echo "selected ";
        } 
        echo "value='".strtolower($option)."'>$option</option>";
    }
}
?>

