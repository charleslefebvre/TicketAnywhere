$(document).ready(function(){
    $("#image-container").click(function() {
        $("#file-reader").click();
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
