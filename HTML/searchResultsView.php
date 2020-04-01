<?php
load_tabs();
?>
<div id="container">  
    <form method="get" action="./searchResults.php?">
    <input id="hidden-input" name="tab" type="hidden">
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
            <select name="category" class="custom-select">
                <?php load_category_options(array('Any','Humor','Music','Kid','Illusion','Dance')); ?>
            </select>
        </div>
    </div>
    </form>  
    <div id="list">
        <?php for($i = 0; $i< 5; ++$i):?>
        <div class="info-container">
            <img src="IMG/show.jpg" height="50" alt="show">
            <div class="infos">
                <h6 class="title">Lover Tour 2020</h6>
                <h6 class="artist">Noah Gundersen</h6>
                <h6 class="category">Categorie: Music</h6>
                <h6 class="price">75$ - 150$</h6>
                <h6 class="ticket">120 tickets left</h6>
            </div>
            <div class="button-container">
                <button class="btn btn-primary">Buy</button>    
            </div>
        </div>
        <?php endfor ?>
    </div>
</div>

