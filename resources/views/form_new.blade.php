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
                <tr>
                    <td><img src="../resources/images/Air-India-logo.png" alt="" width="35px" height="35px">Air India</td>
                    <td>12:00</td>
                    <td>22/12/22</td>
                    <td>15:00</td>
                    <td>24/12/22</td>
                    <td>0</td>
                    <td>$100</td>
                </tr>
                <tr>
                <td><img src="../resources/images/Air-India-logo.png" alt="" width="35px" height="35px">Air India</td>
                <td>12:00</td>
                <td>22/12/22</td>
                <td>15:00</td>
                <td>24/12/22</td>
                <td>0</td>
                <td>$100</td>
                </tr>
            </tbody>
        </table>

    </div>

    <form class="detailform">
            <label style="font-weight: 100;">Passenger 1</label>
            <div class="inputsection">
                <input type="text" name="" placeholder="First name">
                <input type="text" name="" placeholder="Middle">
                <input type="text" name="" placeholder="Last name">
            </div>
            <div class="inputsection">
                <input type="text" name="" placeholder="Suffix">
                <input type="text" name="" placeholder="Date Of Birth">
            </div>
            <div class="inputsection">
                <input type="text" name="" placeholder="Email address">
                <input type="text" name="" placeholder="Phone number">
            </div>
            <div class="inputsection">
                <input type="text" name="" placeholder="Distress number">
                <input type="text" name="" placeholder="Known traveller number">
            </div>

            <label>Emergency contact information</label>
            <div class="inputsection">
                <input type="checkbox" name="" style="margin: 0;">
                <label>Same as Pasenger 1</label>
            </div>
            <div class="inputsection">
                <input type="text" name="" placeholder="First name">
                <input type="text" name="" placeholder="Last name">
            </div>
            <div class="inputsection">
                <input type="text" name="" placeholder="Email address">
                <input type="text" name="" placeholder="Phone number">
            </div>

            <label>Bag information</label><br>
            <span>Each passenger is allowed one free carry-on bag and one personal item.
                 First checked bag for each passenger is also free.
                 Second bag check fees are waived for loyalty program members. See the full bag policy.</span>
                 <div class="baginfo">
                 <label>Passenger 1</label>
                    <label style="margin-right: 70px;">Checked bags</label>   
                </div>
                <div class="baginfo">
                <label >Take name from form</label>
                    <div class="incdec">
                    <i class="fa fa-minus form_icon" aria-hidden="true" onclick="bagSub()" style="padding-right: 5px;"></i>
                    <input type="number" id="pnum" class="form-input" name="adults" value="1" required>
                    <i class="fa fa-plus form_icon" aria-hidden="true" onclick="bagAdd()" style="padding-left: 5px;"></i>
                    </div>
                 </div>
            <div>

            </div>

            <button class="bookbutton">Book Flight</button>
        </form>
    
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
    function bagAdd() {
    var pdetails = document.getElementById('pnum');
    var val = pnum.value;
    if (val < 6)
        val++;
    pdetails.value = val;
}

function bagSub() {
    var pdetails = document.getElementById('pnum');
    var val = pnum.value;
    if (val > 0)
        val--;
    pdetails.value = val;
}
    </script>

    

</body>

</html>