<?php 
    include __DIR__ . "/../CLASSES/SHOW/show.php";

    if(isset($_GET['tab'])){
        $_SESSION['tab'] = $_GET['tab'];
    }
    function displayShow($tab){
        $show = new Show();
        $search = $_GET['search'];
        if($search == ""){
            $showList = $show->getAll();
        } else {
            if($tab == "artists"){
                $showList = $show->getByArtist($search);
            } else if($tab == "auditoriums"){
                $showList = $show->getByAuditorium($search);
            } else if($tab == "categories"){
                $showList = $show->getByCategory($search);
            }
        }
        $show->load_show($showList);
    }
?>

<div id="filter-container">
    <div id='tab-container'>
        <?php load_tabs();?>
    </div>
    <form method="get" action="./searchResults.php?">
    <input id="hidden-input-tab" name="tab" type="hidden">
    <input id="hidden-input-search" value="<?php echo $_GET['search'] ?>" name="search" type="hidden">
    <div id="filter">
        <div id="header">
            <h6 id="title">Filter</h6>
            <button type="submit" class="btn btn-secondary">Apply</button>
        </div>  
        <div class="tab">
            <h6 class="tab-title">Price</h6>
            <label id="priceLabel" for="price">Maximum price: <?php echo(isset($_GET['price'])? $_GET['price']:0)?>$</label>
            <input name="price" type="range" class="custom-range" max="500" value="<?php echo(isset($_GET['price'])? $_GET['price']:0)?>" id="price" oninput="$('#priceLabel')[0].innerText = `Maximum price: ${this.value.toString()}$`;">
        </div>
        <div class="tab">
            <h6 class="tab-title">Category</h6>
            <?php load_category_checkbox(array('Any','Humor','Music','Kid','Illusion','Dance')); ?>
        </div>
    </div> 
    </form>  
</div>

<div id="container">  
    <div id="list">
        <?php (isset($_GET['tab']))? displayShow($_GET['tab']):displayShow("artists") ?>
    </div>
</div>

