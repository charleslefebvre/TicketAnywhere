<?php 
    include_once __DIR__ . "/../CLASSES/SHOW/show.php";
    include_once __DIR__ . "/../CLASSES/CATEGORY/category.php";
    $tab = $_GET['tab'];
    $show = new Show();
    $search = $_GET['search'];
    $showCount = 6;

    $category = new Category;
    $categories = $category->getAll();

?>

<div id="filter-container">
    <div id='tab-container'>
        <?php load_tabs();?>
    </div>
    <input id="hidden-input-tab" name="tab" type="hidden">
    <input id="hidden-input-search" value="<?php echo $_GET['search'] ?>" name="search" type="hidden">
</div>

<div id="container">  
    <div id="list">
        <?php $show->displayShow($tab,$search,$showCount) ?>
    </div>
    <div id="moreShowsContainer">
        <button id='moreShows' class='btn btn-dark'>More</button>
    </div>
</div>

