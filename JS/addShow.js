<<<<<<< HEAD
$(document).ready(function(){
    let newSections = ['G','H','I'];
    let counter = 0;
    $("#image-container").click(function() {
        $("#file-reader").click();
    });

    $('#add-section').click(() => {
        
        if(counter < newSections.length){
            $('#last-row').append(`
            <div class='form-group'>
                <label>Section ${newSections[counter]}</label>
                <input name="price${newSections[counter]}" class="form-control" placeholder="Enter price">
            </div>`)
            counter++;
            $('#remove-section')[0].style.display = 'initial';
        }  
        if(counter == newSections.length)
            $('#add-section')[0].style.display = 'none';     
    });
    $('#remove-section').click(() => {
        $('#last-row').children().last().last().remove();
        counter--;
        if(counter == 0)
            $('#remove-section')[0].style.display = 'none';
        if(counter < newSections.length)
            $('#add-section')[0].style.display = 'initial';     
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = (e) => {
            $('#imageView')
                .attr('src', e.target.result);

            $('#imageView').css({
                'max-height' : '80%',
                'max-width' : '100%'
            });               
        }; 
        reader.readAsDataURL(input.files[0]);
    }
}
=======
$(document).ready(function(){
    let newSections = ['G','H','I'];
    let counter = 0;
    $("#image-container").click(function() {
        $("#file-reader").click();
    });

    $('#add-section').click(() => {
        
        if(counter < newSections.length){
            $('#last-row').append(`
            <div class='form-group'>
                <label>Section ${newSections[counter]}</label>
                <input name="price${newSections[counter]}" class="form-control" placeholder="Enter price">
            </div>`)
            counter++;
            $('#remove-section')[0].style.display = 'initial';
        }  
        if(counter == newSections.length)
            $('#add-section')[0].style.display = 'none';     
    });
    $('#remove-section').click(() => {
        $('#last-row').children().last().last().remove();
        counter--;
        if(counter == 0)
            $('#remove-section')[0].style.display = 'none';
        if(counter < newSections.length)
            $('#add-section')[0].style.display = 'initial';     
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = (e) => {
            $('#imageView')
                .attr('src', e.target.result);

            $('#imageView').css({
                'max-height' : '80%',
                'max-width' : '100%'
            });               
        }; 
        reader.readAsDataURL(input.files[0]);
    }
}
>>>>>>> 670ebc6... Update
