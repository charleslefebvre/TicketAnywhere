$(document).ready(function(){
    $("#image-container").click(function() {
        $("#file-reader").click(); //showIMG
    });

    $("#datepicker").datetimepicker();//date

    let auditoriums = $("#auditoriums").children();
    let options = "";
    for(let item of auditoriums){
        options+= `<option value="${item.value}">${item.textContent}</option>`;
    }
    //let datepicker = $("#datepicker").prop('outerHTML');
    let id = 1;
    let representation = `
    <div class='form-row'>
        <div class='form-group'>
            <label>Date</label>
            <input id="datepicker" name="date${id}" readonly class="form-control long">
        </div>
        <div class='form-group'>
            <label>Auditorium</label>
            <select name='auditoriumId${id}' class='custom-select'>
                ${options}
            </select>
        </div>
        <img id="minusIMG" onclick="removeRepresentaion(this)" src="IMG/minus.png"/>
    </div>`
    let representationContainer = $("#representations");
    $("#plusIMG").click(() => {
        representationContainer.append(representation);   
        id++;
        representation = `
        <div class='form-row'>
            <div class='form-group'>
                <label>Date</label>
                <input id="datepicker" name="date${id}" readonly class="form-control long">
            </div>
            <div class='form-group'>
                <label>Auditorium</label>
                <select name='auditoriumId${id}' class='custom-select'>
                    ${options}
                </select>
            </div>
            <img id="minusIMG" onclick="removeRepresentaion(this)" src="IMG/minus.png"/>
        </div>`
    })
    $(document).on('click', '#datepicker', function() {
        $(this).datetimepicker();
    });

    $('#addShow-form').validate({
        rules: {
            name: {
                required: true
            },
            artist: {
                required: true
            },
            description: {
                required: true,
                maxlength: 200
            },
            categoryId: {
                required: true
            },
            price: {
                required: true
            },
            showImage: {
                required: true
            },
        },
        messages: {
            description: {
                maxlength: "Description cannot be more than 200 characters."
            },
        },
    });
    $('.submit').click(() =>{
        if($('#addShow-form').valid()){
            $('#addShow-form').submit();
        }

    })

});

function readURL(input) { //showIMG
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
function removeRepresentaion(element) {
    element.parentElement.remove();
}