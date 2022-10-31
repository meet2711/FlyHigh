<!DOCTYPE html>
<html lang="en">


<head>
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


    <title>Fly High</title>
</head>

<body>
    @include('header')
    <div id="travelinfo">
        <div style="margin-top: 100px; margin-left:100px">
                <div style="--bs-gutter-y: -1rem;--bs-gutter-x: 0rem;margin-left: 1rem;margin-top: 160px;">
                <form class="row row-cols-lg-auto g-3 align-items-center form">
                    <div class="row-12" >
                        <div>
                            <i class="fa fa-plane-departure form_icon"></i>
                            <input type="text" class="form-input" placeholder="BOM" disabled style="width:70%">
                        </div>
                    </div>
                    <div class="row-12">
                        <div>
                            <i class="fa-solid fa-plane-arrival form_icon"></i>
                            <input type="text" class="form-input" placeholder="BLR" disabled style="width:70%">
                        </div>
                    </div>
                    <div class="row-12">
                        <div>
                            <input type="date" id="datefield" class="form-input" placeholder="Departure: &nbsp"
                            style="margin-right: 20px;">
                        </div>
                    </div>
                    <div class="row-12" id="optional-field">
                        <div>
                            <input type="date" class="form-input" id="datefield" placeholder="Return: &nbsp"
                            style="margin-right: 20px;">
                        </div>
                    </div>
                    <div class="row-12">
                        <div>
                            <i class="fa fa-minus" aria-hidden="true" onclick="passengerSub()"></i>
                            <input type="number" id="pnum" class="form-input" placeholder="No of Adults">
                            <i class="fa fa-plus" aria-hidden="true" onclick="passengerAdd()"
                            style="margin-right: 20px;"></i>
                        </div>
                    </div>
                    <div class="row-12">
                        <a href="public/flights"><button type="submit" class="mybutton">Search</button></a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="searchfilter">
        <select id="multipleselect" multiple name="native-select" placeholder="Max Price" data-search="true" data-silent-initial-value-set="true">
            <option value="1">$100</option>
            <option value="2">$200</option>
            <option value="3">$300</option>
        </select>
        <select id="multipleselect" multiple name="native-select" placeholder="Times" data-search="true" data-silent-initial-value-set="true">
            <option value="1">11 AM - 1PM</option>
            <option value="2">3PM - 5PM</option>
            <option value="3">8PM - 11PM</option>
        </select>
        <select id="multipleselect" multiple name="native-select" placeholder="Airlines" data-search="true" data-silent-initial-value-set="true">
            <option value="1" disabled>Air India</option>
            <option value="2">Indigo</option>
            <option value="3">Akasa Air</option>
        </select>
        <select id="multipleselect" multiple name="native-select" placeholder="Seat Class" data-search="true" data-silent-initial-value-set="true">
            <option value="1" disabled>Business</option>
            <option value="2">Economy</option>
            <option value="3">Broke</option>
        </select>
    </div>


    <!--dropdown list ends with this div -->

    <div class="containspriceandtable">

        <div class="selectedflightdetails" style="margin-top: 5.5em;">

            <table id="flighttable" class="display">
                <thead>
                    <tr>
                        <th>AirLines</th>
                        <th>Duration</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Halts</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">Air India</td>
                        <td>16h 45m</td>
                        <td>7:00 AM</td>
                        <td>4:15PM</td>
                        <td>Non Stop</td>
                        <td>$624</td>
                    </tr>
                    <tr>
                        <td><img id="" src="../resources/images/indigo-logo.png" style="width: 50px; height: 40px; margin-right: 10px;">IndiGO</td>
                        <td>16h 45m</td>
                        <td>7:00 AM</td>
                        <td>4:15PM</td>
                        <td>Non Stop</td>
                        <td>$624</td>
                    </tr>
                    <tr>
                        <td><img src="../resources/images/akasaairlogo.jpg" style="width: 50px; height: 50px; margin-right: 10px;">Akasa Air</td>
                        <td>16h 45m</td>
                        <td>7:00 AM</td>
                        <td>4:15PM</td>
                        <td>Non Stop</td>
                        <td>$624</td>
                    </tr>
                    <tr>
                        <td><img src="../resources/images/gofirst.png" style="width: 50px; height: 40px; margin-right: 10px;">Go
                            First</td>
                        <td>16h 45m</td>
                        <td>7:00 AM</td>
                        <td>4:15PM</td>
                        <td>Non Stop</td>
                        <td>$624</td>
                    </tr>
                    <tr>
                        <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 40px; margin-right: 10px;">Air India</td>
                        <td>16h 45m</td>
                        <td>7:00 AM</td>
                        <td>4:15PM</td>
                        <td>Non Stop</td>
                        <td>$624</td>
                    </tr>
                    <tr>
                        <td><img src="../resources/images/indigo-logo.png" style="width: 50px; height: 40px; margin-right: 10px;">IndiGO</td>
                        <td>16h 45m</td>
                        <td>7:00 AM</td>
                        <td>4:15PM</td>
                        <td>Non Stop</td>
                        <td>$624</td>
                    </tr>
                    <tr>
                        <td><img src="../resources/images/akasaairlogo.jpg" style="width: 50px; height: 40px; margin-right: 10px;">Akasa Air</td>
                        <td>16h 45m</td>
                        <td>7:00 AM</td>
                        <td>4:15PM</td>
                        <td>Non Stop</td>
                        <td>$624</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div style="margin-top: 100px;">
        <table style="border: 1px solid black;">
            <tr style="padding-bottom: 100px;">
                <img src="../resources/images/Air-India-logo.png" alt="" height="50px" width="50px" style="padding-right: 10px;">
                <span style="padding-right:100px">Air India</span>  16h 45m
                <br>
                <span style="padding-right:50px; padding-left:50px">AI603</span>  7:00 AM - 4:15 PM
            </tr>
            <hr>
            <tr>
                <span style="padding-left:100px; padding-right:80px;"><b>SubTotal</b></span>$624
                <br>
                <span style="padding-left:100px; padding-right:40px;"><b>Taxes And Fees</b></span>$16
                <br>
                <span style="padding-left:100px; padding-right:110px;"><b>Total</b></span>$640
            </tr>
        </table>
        </div>
    </div>

    <div class="places">
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

    <script src="../resources/js/virtual-select.min.js"></script>
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