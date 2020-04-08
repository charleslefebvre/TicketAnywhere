<p id="title">New show</p>
<div class="content">
    <form enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group">
            <label>Name of the show</label>
            <input name="name" class="form-control long" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label>Artist</label>
            <input name="artist" class="form-control long" placeholder="Enter artist">
        </div>
        <div id="image-container">
            <img id="imageView" src="IMG/camera.png" alt="image">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label>Category</label>
            <select name="category" class="custom-select long">
                <option value="humor">Humor</option>
                <option value="music">Music</option>
                <option value="kid">Kid</option>
                <option value="illusion">Illusion</option>
                <option value="dance">Dance</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label>Section A</label>
            <input name="priceA" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
        <label>Section B</label>
            <input name="priceB" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label>Section C</label>
            <input name="priceC" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label>Section D</label>
            <input name="priceD" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
        <label>Section E</label>
            <input name="priceE" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label>Section F</label>
            <input name="priceF" class="form-control" placeholder="Enter price">
        </div>
    </div>
    <div id="last-row" class="form-row">
    </div>
    <div id="btn-add-section">
        <button id="add-section" type="button"class="btn btn-primary">Add section</button>
        <button style="display: none" id="remove-section" type="button"class="btn btn-danger">Remove section</button>
    </div>
    <input style="display: none" type="file" name="showImage" id="file-reader" onchange="readURL(this);">
    <button type="submit" class="btn">Add</button>
    </form>
</div>