<?php
    include_once __DIR__ . "/../CLASSES/CATEGORY/category.php";
    include_once __DIR__ . "/../CLASSES/AUDITORIUM/auditorium.php";

    $category = new Category;
    $categories = $category->getAll();
    $auditorium = new Auditorium;
    $auditoriums = $auditorium->getAll();
?>
<p id="title">New show</p>
<div class="content">
    <form enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group">
                <label>Show's name</label>
                <input name="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Artist's name</label>
                <input name="artist" class="form-control" placeholder="Enter name">
            </div>
            <div id="image-container">
                <img id="imageView" src="IMG/camera.png" alt="image">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" rows="4" cols="75"></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Category</label>
                <select name="categoryId" class="custom-select">
                <?php load_select_options($categories,'description')?>
                </select>
            </div>
            <div class="form-group ml-2">
                <label>Starting price</label>
                <input name="price" class="form-control" placeholder="Enter starting price">
            </div>
        </div>
        <hr>
        <div id="representations">
            <h2>Representations</h2>
            <img id="plusIMG" src="IMG/plus.png"/>
            <div class="form-row">
                <div class="form-group">
                    <label>Date</label>
                    <input id="datepicker" name="date" readonly class="form-control long">
                </div>
                <div class="form-group">
                    <label>Auditorium</label>
                    <select id="auditoriums" name="auditoriumId" class="custom-select">
                        <?php load_select_options($auditoriums,'name')?>
                    </select>
                </div>
            </div>
        </div>
        <input style="display: none" type="file" name="showImage" id="file-reader" onchange="readURL(this);">
        <button type="submit" class="btn submit">Add</button>
    </form>
</div>