var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register() {
    x.style.left = "-200px";
    y.style.left = "190px";
    z.style.left = "110px";
}

function login() {
    x.style.left = "190px";
    y.style.left = "-500px";
    z.style.left = "0";
}

var baseurl = "http://localhost/flyhigh/public/";

$("#signup").validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
        },
        password: {
            required: true,
        },
    },
    messages: {
        name: {
            required: "Please enter your name",
        },
        email: {
            required: "Please enter email",
        },
        password: {
            required: "Please enter password",
        },
    },
    submitHandler: function (form) {
        // console.log('test');
        var formData = new FormData(form);

        $.ajax({
            url: baseurl + "auth",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function (response) {
                // console.log(response);
                if (response == 1) {
                    toastr.success("Login Successfull");
                    window.location.href = baseurl + 'home';
                    $('#signup')[0].reset();
                } else {
                    toastr.error("Some error occured, please try again.");
                }
            },
        });
    },
});