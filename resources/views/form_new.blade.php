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
    <link rel="stylesheet" href="../resources/css/form.css">
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
                </tr>
                @endforeach
                @foreach(Session::get('returnf') as $f)
                <tr flight_id="{{ $f->id}}">
                    <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">Air India</td>
                    <td>{{ $f->dep_time}}</td>
                    <td>{{ date_format(date_create($f->dep_date), "d/m/Y")}}</td>
                    <td>{{ $f->arr_time}}</td>
                    <td>{{ date_format(date_create($f->arr_date), "d/m/Y")}}</td>
                    <td>{{ $f->halts}}</td>
                    <td>${{ $f->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    
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

    <script src="../resources/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('#flighttable').DataTable();
        });
        $(document).ready(function() {
            $('#flighttable2').DataTable();
        });
    </script>

</body>

</html>