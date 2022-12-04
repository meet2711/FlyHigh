<!DOCTYPE html>
<html lang="en">


<head>
    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Data table css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Dropdown bootstrap css -->
    <link rel="stylesheet" href="../resources/css/virtual-select.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../resources/css/bookings.css">
    <link rel="stylesheet" href="../resources/css/footer.css">
    <link rel="stylesheet" href="../resources/css/header.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>
    <!-- Font awesome symbols -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'>


    <title>Fly High</title>
</head>

<body>
    @include('header')


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Booking Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="display: flex;align-items: centre; justify-content:center;">
                        <img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">
                    </div>


                    <div style="display: flex; font-size:large;">
                        <div style="width: 50%;">
                            <p>Flight ID</p>
                            <p>Journey Date</p>
                            <p>Arrival</p>
                            <p>Destination</p>
                            <p>Arrival Time</p>
                            <p>Destination Time</p>
                            <p>Halts</p>
                            <p>Price</p>
                            <p>Taxes</p>
                            <p>Total Price</p>
                        </div>
                        <div style="width: 50%;display: flex;align-items: flex-end;flex-direction: column;">
                            <p id="f_id"></p>
                            <p id="f_date"></p>
                            <p id="f_arr"></p>
                            <p id="f_des"></p>
                            <p id="f_arr_time"></p>
                            <p id="f_des_time"></p>
                            <p id="f_halts"></p>
                            <p id="f_price"></p>
                            <p>4</p>
                            <p id="f_total"></p>
                        </div>
                    </div>
                    <div class="modal-footer" style="display: flex;align-items: centre; justify-content:center;">
                        <button type="button" class="btn cancel_booking" style="border-radius: 5px; background-color:#93d1f0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr>
    <div>
        <h1>My Bookings</h1>
    </div>
    <hr>

    @if($flights != null)
    <div class="containspriceandtable">

        <div class="selectedflightdetails" style="margin-top: 5.5em;">

            <table id="flighttable" class="display">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Booking Date</th>
                        <th>AirLines</th>
                        <th>Arrival Date</th>
                        <th>Arrival Time</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($flights as $f)
                    <tr flight_id = "{{$f[2][0]->id}}">
                        <td>{{$f[0]}}</td>
                        <td>{{date_format(date_create($f[1]), 'd/m/Y')}}</td>
                        <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">Air India</td>
                        <td>{{date_format(date_create($f[2][0]->arr_date), 'd/m/Y')}}</td>
                        <td>{{$f[2][0]->arr_time}}</td>
                        <td>{{date_format(date_create($f[2][0]->dep_date), 'd/m/Y')}}</td>
                        <td>{{$f[2][0]->dep_time}}</td>
                        <td>${{$f[2][0]->price}}</td>
                        <td><button type="button" class="btn view_flight" data-toggle="modal" data-target="#exampleModalCenter" style="border-radius: 5px; background-color:#93d1f0">View
                                Details</button></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    @else
    <div class="container" style="padding-left: 507px;">
        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_yuisinzc.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        <p>Book a flight first!</p>
    </div>
    @endif


    <!-- footer from next line -->
    @include('footer')
    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <!-- Custom JS -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="../resources/js/bookings.js"></script>
    <script src="../resources/js/virtual-select.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="js/dropdown.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#flighttable').DataTable();
        });
    </script>

    <script>
        VirtualSelect.init({
            ele: '#multipleselect'
        });
    </script>
</body>

</html>