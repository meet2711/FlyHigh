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
    <div id="layer2">
        <div>
            <div style="--bs-gutter-y: -1rem;--bs-gutter-x: 0rem;">

                <div style="display: flex;align-items:center;">
                    <div style="width: 40%;display:flex;padding-left: 18px;">
                        <div>
                            <lottie-player src="https://assets1.lottiefiles.com/temp/lf20_dgjK9i.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
                        </div>
                        <div>
                            <p style="font-size: xx-large;margin-top:26px">Here's the weather info of {{Session::get('dest')}} :</p>
                        </div>
                    </div>
                    <div class="values">
                        <div class="info" style="margin-right: 10rem;">
                            <p>Temperature: <span>{{Session::get('temp') - 273.15}}ºC</span></p>
                        </div>
                        <div class="info" style="margin-right: 10rem;">
                            <p>Humidity: <span>{{Session::get('humid')}}%</span></p>
                        </div>
                        <div class="info">
                            <p>Condition: <span>{{Session::get('condition')}}</span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
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
                    <div style="display: flex;align-items: centre; justify-content:center;">
                        <img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">
                    </div>


                    <div style="display: flex; font-size:large;">
                        <div style="width: 50%;">
                            <p>Flight ID</p>
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

                    <!-- <img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">

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
                    </table> -->
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                    <td>{{ date_format(date_create($f->arr_date), "d/m/Y")}}</td>
                    <td>{{ $f->dep_time}}</td>
                    <td>{{ date_format(date_create($f->dep_date), "d/m/Y")}}</td>
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
                    <td>{{ date_format(date_create($f->dep_date), "d/m/Y")}}</td>
                    <td>{{ $f->arr_time}}</td>
                    <td>{{ date_format(date_create($f->arr_date), "d/m/Y")}}</td>
                    <td>{{ $f->halts}}</td>
                    <td>${{ $f->price}}</td>
                    <td><input type="radio" name="returnflight" value="{{ $f->id}}"></td>
                    <td><button type="button" class="btn select_flight" data-toggle="modal" data-target="#exampleModalCenter" style="border-radius: 5px; background-color:#93d1f0">Flight Details</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="book-btn">
        <button type="button" class="btn btn-primary book_return">Book Now!</button>
    </div>
    @endif
    @if(Session::get('returnf') == null)
    <div class="book-btn">
        <button type="button" class="btn btn-primary book">Book Now!</button>
    </div>
    @endif
    <div class=" places">
        <div style="margin-top: 2em;">
            <p style="margin-left: 20px;">Find places to stay in {{Session::get('dest')}}</p>
        </div>
        <div class="card-group">

            @foreach(Session::get('hotels') as $key => $value)
            @if($loop->iteration > 3)
            @break
            @endif
            <div class="card ">
                <img src="https://{{Session::get('imgs')[$loop->iteration]}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$key}}
                    </h5>
                    <p class="card-text">{{$value}}</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>

            @endforeach
        </div>
    </div>
    <div>
        <p style="margin-left: 20px;">Place to visit in {{Session::get('dest')}}</p>
    </div>
    <div class="card-group places">
        <div class="card">
            <img src="https://www.holidify.com/images/cmsuploads/compressed/5621259188_e74d63cb05_b_20180302140149.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Morning Walk near India Gate
                </h5>
                </h5>
                <p class="card-text">India Gate is a war memorial located in New Delhi, along the Rajpath. It is dedicated to the 82,000 soldiers, both Indian and British, who died during the First World War and the Third Anglo-Afghan War. India Gate looks stunning at night with the fountain displaying colourful lights. The surrounding lush green lawns are a popular picnic spot. The Amar Jawan Jyoti is also located here.</p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
        </div>
        <div class="card">
            <img src="https://www.holidify.com/images/cmsuploads/compressed/Qutub_Minar_in_the_monsoons_20170908115259.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Qutub Minar
                </h5>
                <p class="card-text">Qutub Minar is a minaret or a victory tower located in the Qutub complex, a UNESCO World Heritage Site in Delhi's Mehrauli area. With a height of 72.5 metres (238 ft), Qutub Minar is the second tallest monument of Delhi. The surrounding Qutub complex has lush green lawns which are popular picnic spot.</p>
            </div>
        </div>
        <div class="card">
            <img src="https://www.holidify.com/images/cmsuploads/compressed/attr_wiki_4067_20191212124026.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Swaminarayan Akshardham Temple</h5>
                <p class="card-text">The Akshardham Temple, also known as Swaminarayan Akshardham is dedicated to Lord Swaminarayan. It is known for its stunning architecture. Akshardham complex is home to India's largest step well which is a host to the mesmerising water show each evening.</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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