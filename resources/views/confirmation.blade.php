<!DOCTYPE html>
<html lang="en">


<head>
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
    <link rel="stylesheet" href="../resources/css/confirmation.css">
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
    @if($data)
    <div style="display: flex;">
        <div style="margin-left: 2rem; margin-top:2rem;width:65%">
            <div class="alert alert-success" style="width: 90%;">
                <!-- you missed this line of code -->
                <!-- <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                <button type="button" class="btn-close" aria-label="Close" data-dismiss="alert" style="float:right;padding-top:30px"></button>
                <div style="display: flex;padding-top: 11px;">
                    <span>
                        <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_hFmz66beuw.json" background="transparent" speed="1" style="width: 30px; height: 30px;" loop autoplay></lottie-player>
                    </span>
                    <p style="margin-top: 2px;"><strong>Your flight has been booked successfully! Your confirmation number is #{{$data['bid']}}</strong></p>
                </div>

            </div>
            <div>
                <h4 class="bold"><strong>Bon voyage, {{$data['name']}}!</strong></h4>
                <p>Confirmation number: #{{$data['bid']}}</p>
                <p style="width: 90%;">Thank you for booking your travel with FlyHigh! Below is a summary of your trip to Delhi. We’ve sent a copy of your booking confirmation to your email address. You can also find this page again in <span class="bold">My trips</span>.</p>
            </div>
            <div>
                <hr>
                <h4>Flight summary</h4>
                <hr>
                <div class="containspriceandtable">
                    <!-- <div class="selectedflightdetails"> -->
                    <table id="flighttable" class="display">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>AirLines</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{date_format(date_create($data['flight'][0]->arr_date), 'd/m/Y')}}</td>
                                <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">Air India</td>
                                <td>{{$data['flight'][0]->arr_time}}</td>
                                <td>{{$data['flight'][0]->dep_time}}</td>
                                <td>${{$data['flight'][0]->price}}</td>

                            </tr>
                            @if($data['rflight'] != null)
                            <tr>
                                <td>{{date_format(date_create($data['rflight'][0]->arr_date), 'd/m/Y')}}</td>
                                <td><img id="" src="../resources/images/indigo-logo.png" style="width: 50px; height: 40px; margin-right: 10px;">IndiGO</td>
                                <td>{{$data['rflight'][0]->arr_time}}</td>
                                <td>{{$data['rflight'][0]->dep_time}}</td>
                                <td>${{$data['rflight'][0]->price}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- </div> -->
                </div>
            </div>
            <div>
                <hr>
                <h4>Price breakdown</h4>
                <hr>
                <div style="display: flex; width :60%;">
                    <div style="width: 50%;">
                        @if($data['rflight'] != null)
                        <p>Going Flight </p>
                        <p>Return Flight </p>
                        @else
                        <p>Flight </p>
                        @endif
                        <p>Adults </p>
                        <p>Subtotal </p>
                        <p>Baggage fees </p>
                        <p>Taxes </p>
                    </div>
                    <div style="width: 50%;display: flex;align-items: flex-end;flex-direction: column;">
                        <p>${{$data['flight'][0]->price}}</p>
                        @if($data['rflight'] != null)
                        <p>${{$data['rflight'][0]->price}}</p>
                        @endif
                        <p>{{$data['adults']->number}}</p>
                        @if($data['rflight'] != null)
                        <p>${{$data['flight'][0]->price + $data['rflight'][0]->price}} x {{$data['adults']->number}} = ${{($data['flight'][0]->price + $data['rflight'][0]->price)* $data['adults']->number }}</p>
                        @else
                        <p>${{$data['flight'][0]->price}} x {{$data['adults']->number}}${{$data['flight'][0]->price * $data['adults']->number }}</p>
                        @endif
                        <p>$100</p>
                        @if($data['rflight'] != null)
                        <p>${{8 * $data['adults']->number}}</p>
                        @else
                        <p>${{4 * $data['adults']->number}}</p>
                        @endif
                    </div>
                    <hr>
                </div>
                <div style="width:60% ;">
                    <hr>
                </div>
                <div style="display: flex; width :60%;">
                    <div style="width: 50%;">
                        <p>Amount paid </p>
                    </div>
                    <div style="width: 50%;display: flex;align-items: flex-end;flex-direction: column;">
                        @if($data['rflight'] != null)
                        <p>${{($data['flight'][0]->price + $data['rflight'][0]->price + 8)* $data['adults']->number + 100}}</p>
                        @else
                        <p>${{$data['flight'][0]->price + 104}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div style="margin-top:10rem ;">
                <img src="../resources/images/map.png" alt="" width="80%">
            </div>
        </div>
        <div style="width: 35%;">
            <div class="places" style="margin-left: 2rem; margin-top:2rem;">
                <h4>View <span class="bold">hotels</span></h4>
                <p style="width: 70%;">FlyHigh partners with thousands of hotels to get you the best deal. Save up to 30% when you add a hotel to your trip.</p>
                <div class=" card-group" style="flex-direction: column ;">
                    @foreach($data['hotels'] as $key => $value)
                    @if($loop->iteration > 3)
                    @break
                    @endif
                    <div class="card ">
                        <img src="https://{{$data['imgs'][$loop->iteration]}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$key}}
                            </h5>
                            <p class="card-text">{{$value}}</p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>

                    @endforeach

                </div>
                <div class="shopAll">
                    <button class="button success">View all hotels</button>
                </div>
                
            </div>
        </div>
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

    <!-- <script src="js/dropdown.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="../resources/js/virtual-select.min.js"></script>

</body>

</html>