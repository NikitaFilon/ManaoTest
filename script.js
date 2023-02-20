$(document).on('click', '#btn_register', function (e) {

        e.preventDefault();

        var form = document.querySelector("form");
        var name = $('#txt_name').val();
        var email = $('#txt_email').val();
        var password = $('#txt_password').val();
        var confirmPassword = $('#txt_confirmPassword').val();
        var login = $('#txt_login').val();

    if(ValidateUser(login,password,confirmPassword,email,name,form)){
        $.ajax({
            url: 'registerUser.php',
            type: 'post',
            data:
                {
                    name: name,
                    email: email,
                    login: login,
                    confirmPassword: confirmPassword,
                    password: password
                },
            success: function (response) {
                $('#message').html(response);
            }
        });

        $('#registraion_form')[0].reset();
    }


})
;

$(document).on('click', '#btn_auth', function (e) {

        e.preventDefault();

        var password = $('#txt_password').val();
        var login = $('#txt_login').val();


        $.ajax({
                url: 'authorization.php',
                type: 'post',
                data:
                    {
                            login: login,
                            password: password
                    },
                success: function (response) {
                        $('#message').html(response);
                }
        });



})
;




function ValidateUser(loginValue,passwordValue,confirmPasswordValue,emailValue,nameValue, form){
    event.preventDefault();
    let isValid = true;

    if (loginValue.length < 6) {
        document.getElementById("login-error").textContent = "Login must be at least 6 characters long.";
        isValid = false;
    } else if (loginValue.includes(" ") || loginValue[0] === " " || loginValue[loginValue.length - 1] === " ") {
        document.getElementById("login-error").textContent = "Login must not contain spaces or start/end with spaces.";
        isValid = false;
    }


    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    if (passwordValue.length < 6) {
        document.getElementById("password-error").textContent = "Password must be at least 6 characters long.";
        isValid = false;
    } else if (!passwordRegex.test(passwordValue)) {
        document.getElementById("password-error").textContent = "Password must contain at least one letter and one digit.";
        isValid = false;
    }

    if (passwordValue !== confirmPasswordValue) {
        document.getElementById("confirm-password-error").textContent = "Passwords do not match.";
        isValid = false;
    }


    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailValue)) {
        document.getElementById("email-error").textContent = "Please enter a valid email address.";
        isValid = false;
    }


    if (nameValue.length < 1) {
        document.getElementById("name-error").textContent = "Name must be at least 2 characters long.";
        isValid = false;
    } else if (nameValue.length > 2 ) {
        document.getElementById("name-error").textContent = "Name must be at least 3 characters long.";
        isValid = false;
    } else if (!/^[a-zA-Z]+$/.test(nameValue)) {
        document.getElementById("name-error").textContent = "Name must contain only letters.";
        isValid = false;
    }
    if (isValid) {
        form.submit();
    }
    return isValid;
}
