var baseurl = "http://localhost/flyhigh/public/";

$(document).on('click', '.select_flight', function () {
    var f_id = $(this).closest('tr').attr("flight_id");
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

$(document).on('click', '.book_return', function () {
    var checked = document.querySelectorAll("input[type=radio]:checked");
    if (checked.length < 2) {
        toastr.error("Please select the flights first");
    }
    else {
        var f_id = checked[0].value;
        var rf_id = checked[1].value;
        var adults = $('#pnum').val();
        window.location.href = baseurl + "form/" + f_id + "/" + rf_id + "/" + adults;
    }
});

$(document).on('click', '.book', function () {
    var checked = document.querySelectorAll("input[type=radio]:checked");
    if (checked.length == 0) {
        toastr.error("Please select the flights first");
    }
    else {
        var f_id = checked[0].value;
        var adults = $('#pnum').val();
        window.location.href = baseurl + "form/" + f_id + "/" + adults;
    }
});