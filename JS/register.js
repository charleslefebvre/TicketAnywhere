<<<<<<< HEAD
$(document).ready(function() {

    $('#register-form').validate({
        rules: {
            f_name: {
                required: true,
            },
            l_name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            pw: {
                required: true,
                minlength: 5
            },
            cpw: {
                required: true,
                minlength: 5,
                equalTo: '#pw'
            },
        },
        messages: {
            email: {
                email: 'Please enter a valid email address.'
            },
            pw: {
                minlength: "Password must be at least 5 characters long."
            },
            cpw: {
                equalTo: 'Confirmation password does not match.'
            } 
        },
    });
    $('.submit').click(() => {
        $('#register-form').submit();
    })
=======
$(document).ready(function() {

    $('#register-form').validate({
        rules: {
            f_name: {
                required: true,
            },
            l_name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            pw: {
                required: true,
                minlength: 5
            },
            cpw: {
                required: true,
                minlength: 5,
                equalTo: '#pw'
            },
        },
        messages: {
            email: {
                email: 'Please enter a valid email address.'
            },
            pw: {
                minlength: "Password must be at least 5 characters long."
            },
            cpw: {
                equalTo: 'Confirmation password does not match.'
            } 
        },
    });
    $('.submit').click(() => {
        $('#register-form').submit();
    })
>>>>>>> 670ebc6... Update
});