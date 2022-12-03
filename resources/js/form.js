var baseurl = "http://localhost/flyhigh/public/";

function bagAdd() {
    var pdetails = document.getElementById('pnum');
    var val = pdetails.value;
    if (val < 6)
        val++;
    pdetails.value = val;
}

function bagSub() {
    var pdetails = document.getElementById('pnum');
    var val = pdetails.value;
    if (val > 0)
        val--;
    pdetails.value = val;
}

$("#pdetails").validate({
    submitHandler: function (form) {
        var formData = new FormData(form);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: baseurl + "confirm",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function (response) {
                console.log(response);
                if (response == 1) {
                    window.location.href = baseurl + 'confirmation_page';
                } else {
                    toastr.error("Something went wrong, please try again");
                }
            },
        });
    },
});