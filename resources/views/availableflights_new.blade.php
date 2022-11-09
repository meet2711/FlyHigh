<!DOCTYPE html>
<html lang="en">


<head>
    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Data table css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Dropdown bootstrap css -->
    <link rel="stylesheet" href="../resources/css/virtual-select.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../resources/css/availableflights.css">
    <link rel="stylesheet" href="../resources/css/footer.css">
    <link rel="stylesheet" href="../resources/css/header.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>
    <!-- Font awesome symbols -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <title>Fly High</title>
</head>

<body>
    @include('header')
    <div id="layer1">
        <div>
            <div style="--bs-gutter-y: -1rem;--bs-gutter-x: 0rem;margin-left: 1rem;margin-top: 16px;margin-right: 1rem;">

                <form style="display: flex; justify-content:space-between; padding-top:50px;" action="flights" method="POST">
                    @csrf
                    <div>
                        <div style="display: flex;">
                            <i class="fa fa-plane-departure form_icon"></i>
                            <input type="text" class="form-input" name="arrival" class="form-input" value="{{Session::get('flight')[0]->arr}}" style="width:150px">

                        </div>
                    </div>
                    <div>
                        <div style="display: flex;">
                            <i class="fa-solid fa-plane-arrival form_icon"></i>
                            <input type="text" class="form-input" name="departure" class="form-input" value="{{Session::get('flight')[0]->dep}}" style="width:150px">
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="date" id="datefield" class="form-input" name="arrival_date" style="width:150px;" value="{{Session::get('arr_date')}}">
                        </div>
                    </div>
                    @if(Session::get('returnf') != null)
                    <div>
                        <div id="optional-field">
                            <input type="date" class="form-input" name="departure_date" id="datefield" style="width:150px;" value="{{Session::get('ret_date')}}">
                        </div>
                    </div>
                    @endif
                    <div>
                        <div style="display: flex;">
                            <i class="fa fa-minus form_icon" aria-hidden="true" onclick="passengerSub()" style="padding-right: 5px;"></i>
                            <input type="number" id="pnum" class="form-input" name="adults" placeholder="No of Adults" style="width:150px" value="{{Session::get('adults')}}">
                            <i class="fa fa-plus form_icon" aria-hidden="true" onclick="passengerAdd()" style="padding-left: 5px;"></i>
                        </div>
                    </div>
                    <div>
                        <!-- <a href="public/flights"> -->
                        <button type="submit" class="home_search_button">Search</button>
                        <!-- </a> -->
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Air India</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">

                    <table>
                        <tbody>
                            <tr>
                                <td>Flight ID</td>
                                <td id="f_id"></td>
                            </tr>
                            <tr>
                                <td>Arrival</td>
                                <td id="f_arr"></td>
                            </tr>
                            <tr>
                                <td>Destination</td>
                                <td id="f_des"></td>
                            </tr>
                            <tr>
                                <td>Arrival Time</td>
                                <td id="f_arr_time"></td>
                            </tr>
                            <tr>
                                <td>Destination Time</td>
                                <td id="f_des_time"></td>
                            </tr>
                            <tr>
                                <td>Halts</td>
                                <td id="f_halts"></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td id="f_price"></td>
                            </tr>
                            <tr>
                                <td>Taxes</td>
                                <td>$4</td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td id="f_total">$</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Book Now!</button>
                </div>
            </div>
        </div>
    </div>

    <!--dropdown list ends with this div -->

    <!-- <div class="width-maker"> -->
    <div class="selectedflightdetails">

        <table id="flighttable" class="display" style="border: 1px solid #1DB4FF;">
            <thead>
                <tr>
                    <th style="text-align: center;">AirLines</th>
                    <th style="text-align: center;">Arrival</th>
                    <th style="text-align: center;">Arrival Date</th>
                    <th style="text-align: center;">Departure</th>
                    <th style="text-align: center;">Departure Date</th>
                    <th style="text-align: center;">Halts</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Select Flight</th>
                    <th style="text-align: center;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach(Session::get('flight') as $f)
                <tr flight_id="{{ $f->id}}">
                    <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">Air India</td>
                    <td>{{ $f->arr_time}}</td>
                    <td>{{ $f->arr_date}}</td>
                    <td>{{ $f->dep_time}}</td>
                    <td>{{ $f->dep_date}}</td>
                    <td>{{ $f->halts}}</td>
                    <td>${{ $f->price}}</td>
                    <td><input type="radio" name="flight" value="{{ $f->id}}"></td>
                    <td><button type="button" class="btn select_flight" data-toggle="modal" data-target="#exampleModalCenter" style="border-radius: 5px; background-color:#93d1f0">Flight Details</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @if(Session::get('returnf') != null)
    <div class="selectedflightdetails" style="margin-top: 5.5em;">

        <table id="flighttable2" class="display" style="border:1px solid #1DB4FF;">
            <thead>
                <tr>
                    <th style="text-align: center;">AirLines</th>
                    <th style="text-align: center;">Departure</th>
                    <th style="text-align: center;">Departure Date</th>
                    <th style="text-align: center;">Arrival</th>
                    <th style="text-align: center;">Arrival Date</th>
                    <th style="text-align: center;">Halts</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Select Flight</th>
                    <th style="text-align: center;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach(Session::get('returnf') as $f)
                <tr flight_id="{{ $f->id}}">
                    <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">Air India</td>
                    <td>{{ $f->dep_time}}</td>
                    <td>{{ $f->dep_date}}</td>
                    <td>{{ $f->arr_time}}</td>
                    <td>{{ $f->arr_date}}</td>
                    <td>{{ $f->halts}}</td>
                    <td>${{ $f->price}}</td>
                    <td><input type="radio" name="returnflight" value="{{ $f->id}}"></td>
                    <td><button type="button" class="btn select_flight" data-toggle="modal" data-target="#exampleModalCenter" style="border-radius: 5px; background-color:#93d1f0">Flight Details</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    <div class="book-btn">
        <button type="button" class="btn btn-primary" onclick="bookflight()">Book Now!</button>
    </div>
    <div class=" places">
        <div style="margin-top: 2em;">
            <p style="margin-left: 20px;">Find places to stay in Bangalore</p>
        </div>
        <div class="card-group">
            <div class="card ">
                <img src="../resources/images/park,bangalore.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">The Park, </span><span class="price"> $598</span></h5>
                    </h5>
                    <p class="card-text">Located at Ulsoor, an uber-chic property in downtown, offering a host of
                        leisure services,
                        luxurious rooms and suites, and premium dining options.</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
            <div class="card">
                <img src="../resources/images/octave.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Octave Himalaya Monarch, </span><span class="price">$981</span></h5>
                    <p class="card-text">Located in Gandhi Nagar,Bangalore with impeccable rooms, conference facilities
                        and close proximity to transits and landmarks,
                        Hotel Himalaya by Monarch ensures a pocket-friendly accommodation.</p>
                </div>
            </div>
            <div class="card">
                <img src="https://r2imghtlak.mmtcdn.com/r2-mmt-htl-image/htl-imgs/201306271508561947-bdd039ba1df811e8832b02755708f0b3.jpg?&output-quality=75&downsize=520:350&crop=520:350;81,0&output-format=jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">The Signature Inn, <span class="price">$633</span></h5>
                    <p class="card-text">Experience a truly unique stay in an authentic hotel.
                        Enjoy comfort & luxury at pocket friendly prices in Electronic City of India at Signature Inn.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <p style="margin-left: 20px;">Place to visit in Bangalore</p>
    </div>
    <div class="card-group places">
        <div class="card ">
            <img src="https://i.ytimg.com/vi/Ih3Qo0bmmC0/maxresdefault.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Wonderla Amusement Park<span class="price">$598</span>
                </h5>
                </h5>
                <p class="card-text">A fun place for all age groups in Bengaluru</p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
        </div>
        <div class="card">
            <img src="https://images-acme.mmtcdn.com/prod-acme-image/system/product_media/c/53514/media6B2GA8XSQ8G4A.jpg?imwidth=520&quality=70" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Guhantara - The Underground Cave Resort <span class="price">$981</span>
                </h5>
                <p class="card-text">Dubbed the Safari Capital of the World</p>
            </div>
        </div>
        <div class="card">
            <img src="https://www.explorebees.com/uploads/kokrebellur%20bird%20sanctuary.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Kokkare Bellur Bird Sanc.<span class="price">$633</span></h5>
                <p class="card-text">Escape from the hustle-bustle of life and immerse yourself in nature</p>
            </div>
        </div>
    </div>
    <!-- footer from next line -->
    @include('footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="js/dropdown.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script src="../resources/js/virtual-select.min.js"></script>
    <script src="../resources/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('#flighttable').DataTable();
        });
        $(document).ready(function() {
            $('#flighttable2').DataTable();
        });
    </script>

    <script>
        VirtualSelect.init({
            ele: '#multipleselect'
        });
    </script>
    <script>
        function passengerAdd() {
            var pdetails = document.getElementById('pnum');
            var val = pnum.value;
            if (val < 6)
                val++;
            pdetails.value = val;
        }

        function passengerSub() {
            var pdetails = document.getElementById('pnum');
            var val = pnum.value;
            if (val > 0)
                val--;
            pdetails.value = val;
        }
    </script>
</body>

</html>