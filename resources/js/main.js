var baseurl = "http://localhost/flyhigh/public/";
// $("#details").validate({
//     submitHandler: function (form) {
//         console.log('test');
//         var formData = new FormData(form);

//         $.ajax({
//             url: baseurl + "fd",
//             type: "POST",
//             data: formData,
//             contentType: false,
//             processData: false,

//             success: function (response) {
//                 console.log(response);
//                 // if (response == 1) {
//                 //     toastr.success("Login Successfull");
//                 //     $('#signup')[0].reset();
//                 // } else {
//                 //     toastr.error("Email, password or pin not correct.");
//                 // }
//             },
//         });
//     },
// });

$(document).on('click', '.select_flight', function () {
    var f_id = $(this).closest('tr').attr("flight_id");
    // console.log(f_id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: baseurl + 'select_flight',
        data: {
            'f_id': f_id,
        },
        success: function (response) {
            // console.log(response[0].id);
            document.getElementById("f_id").innerHTML = response[0].id;
            document.getElementById("f_arr").innerHTML = response[0].arr;
            document.getElementById("f_des").innerHTML = response[0].dep;
            document.getElementById("f_arr_time").innerHTML = response[0].arr_time;
            document.getElementById("f_des_time").innerHTML = response[0].dep_time;
            document.getElementById("f_halts").innerHTML = response[0].halts;
            document.getElementById("f_price").innerHTML = "$" + response[0].price;
            document.getElementById("f_total").innerHTML = "$" + (response[0].price + 4);
        }
    });
});