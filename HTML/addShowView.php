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
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" rows="4" cols="75"></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label>Category</label>
            <select name="category" class="custom-select">
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
            <label>Starting price</label>
            <input name="price" class="form-control" placeholder="Enter starting price">
        </div>
    </div>
    <input style="display: none" type="file" name="showImage" id="file-reader" onchange="readURL(this);">
    <button type="submit" class="btn submit">Add</button>
    </form>
</div>