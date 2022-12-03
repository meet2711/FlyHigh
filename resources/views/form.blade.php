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

    <div>
        <h1>Selected Flight</h1>
    </div>
    <div class="selectedflightdetails">

        <table>
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
                <?php $t = 0; ?>
                @foreach(Session::get('flight') as $f)
                <?php $flights = $f->id ?>
                <tr flight_id="{{ $f->id}}">
                    <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">Air India</td>
                    <td>{{ $f->arr_time}}</td>
                    <td>{{ date_format(date_create($f->arr_date), "d/m/Y")}}</td>
                    <td>{{ $f->dep_time}}</td>
                    <td>{{ date_format(date_create($f->dep_date), "d/m/Y")}}</td>
                    <td>{{ $f->halts}}</td>
                    <td>${{ $f->price}}</td>
                    <?php $t = $f->price + 4; ?>
                </tr>
                @endforeach
                @if(Session::get('returnf') != null)
                <?php $flights .= "," ?>
                @foreach(Session::get('returnf') as $f)
                <?php $flights .= $f->id ?>
                <tr flight_id="{{ $f->id}}">
                    <td><img src="../resources/images/Air-India-logo.png" style="width: 50px; height: 50px; margin-right: 10px;">Air India</td>
                    <td>{{ $f->dep_time}}</td>
                    <td>{{ date_format(date_create($f->dep_date), "d/m/Y")}}</td>
                    <td>{{ $f->arr_time}}</td>
                    <td>{{ date_format(date_create($f->arr_date), "d/m/Y")}}</td>
                    <td>{{ $f->halts}}</td>
                    <td>${{ $f->price}}</td>
                    <?php $t += ($f->price + 4); ?>
                </tr>
                @endforeach
                @endif
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Tax</strong></td>
                    @if(Session::get('returnf') != null)
                    <td>$8</td>
                    @else
                    <td>$4</td>
                    @endif
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total Fare</strong></td>
                    <td>${{$t}} x {{Session::get('adults')}} = ${{$t * Session::get('adults')}}</td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="formandimage">
        <div class="suitcaseimg">
            <img src="../resources/images/Group1.png" alt="">
        </div>
        <div class="containform">
            <form class="detailform" id="pdetails">
                <input type="hidden" name="flights" value="{{$flights}}">
                <input type="hidden" name="adults" value="{{Session::get('adults')}}">
                <input type="hidden" name="fare" value="{{ $t * Session::get('adults') }}">
                @foreach(range(1, Session::get('adults')) as $pno)
                <label style="font-weight: 100;">Passenger {{$pno}}</label>
                <div class="inputsection">
                    <input type="text" name="f_name_{{$pno}}" placeholder="First name" required>
                    <input type="text" name="m_name_{{$pno}}" placeholder="Middle" required>
                    <input type="text" name="l_name_{{$pno}}" placeholder="Last name" required>
                </div>
                <div class="inputsection">
                    <input type="text" name="country_{{$pno}}" placeholder="Residing Country" required>
                    <input type="text" name="dob_{{$pno}}" placeholder="Date Of Birth(DD/MM/YYY)" required>
                </div>
                <div class="inputsection">
                    <input type="text" name="email_{{$pno}}" placeholder="Email address" required>
                    <input type="text" name="p_number_{{$pno}}" placeholder="Phone number" required>
                </div>
                <div class="inputsection">
                    <input type="text" name="d_number_{{$pno}}" placeholder="Distress number" required>
                    <input type="text" name="k_number_{{$pno}}" placeholder="Known traveller number" required>
                </div>

                <label>Emergency contact information</label>
                <div class="inputsection">
                    <input type="checkbox" name="" style="margin: 0;">
                    <label>Same as Passenger {{$pno}}</label>
                </div>
                <div class="inputsection">
                    <input type="text" name="f_name_e_{{$pno}}" placeholder="First name" required>
                    <input type="text" name="l_name_e_{{$pno}}" placeholder="Last name" required>
                </div>
                <div class="inputsection">
                    <input type="text" name="email_e_{{$pno}}" placeholder="Email address" required>
                    <input type="text" name="p_number_e_{{$pno}}" placeholder="Phone number" required>
                </div>

                <label>Bag information</label><br>
                <span>Each passenger is allowed one free carry-on bag and one personal item.
                    First checked bag for each passenger is also free.
                    Second bag check fees are waived for loyalty program members. See the full bag policy.</span>
                <div style="margin-top: 40px;">
                    <div class="baginfo">
                        <label>Passenger {{$pno}}</label>
                        <label style="margin-right: 70px;">Checked bags</label>
                    </div>
                    <div class="baginfo">
                        <label>{{Auth::user()->name}}</label>
                        <div class="incdec">
                            <i class="fa fa-minus form_icon" aria-hidden="true" onclick="bagSub()" style="padding-right: 5px;"></i>
                            <input type="number" id="pnum" class="form-input" name="bags" value="1" required disabled>
                            <i class="fa fa-plus form_icon" aria-hidden="true" onclick="bagAdd()" style="padding-left: 5px;"></i>
                        </div>
                    </div>
                </div>
                @endforeach
                <button type="submit" class="bookbutton">Book Flight</button>
            </form>
        </div>
    </div>

    @include('footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- <script src="js/dropdown.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>


    <script src="../resources/js/form.js"></script>

</body>

</html>