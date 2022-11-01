<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../resources/css/form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../resources/js/form.js"></script>
</head>
<body>
    @include('header')
<table>
<tr>
<td style="text-align:center">
<br>
<div class="imgdiv">
    <span style="color: #1DB4FF">Selected Flights</span>
    <img src="../resources/images/selected.jpg">
    <span style="color: #1DB4FF">Baggage Constraints</span>
    <img src="../resources/images/baggage.jpg">
</div>
</td>
<td>
<div class="form-div">
<label id="sample">Enter the required information for each traveler and be sure that it exactly matches the government-issued ID presented at the airport.</label>
<br>
<label>Passenger 1 (Adult)</label>
<br>
<table class="table1">
    <tr>
        <td>
        <input type='text' placeholder="First Name*"></input>
        </td>
        <td class="middle1">
        <input type='text' placeholder="Middle" ></input>
        </td>
        <td class="middle1">
        <input type='text' placeholder="Last Name*"></input>
        </td>
    </tr>
    <tr>
        <td>
        <input type='text' placeholder="Suffix"></input>
        </td>
        <td class="middle1">
        <input type='date' placeholder="Date of Birth*"></input>
        </td>
    </tr>
    <tr>
    <td>
        <input type='email' placeholder="Email address*"></input>
    </td>
        <td class="middle1">
        <input type='text' placeholder="Phone Number*"></input>
        </td>
    </tr>
    <tr>
    <td>
        <input type='text' placeholder="Distress Number"></input>
    </td>
        <td class="middle1">
        <input type='text' placeholder="Known Traveller Number*"></input>
        </td>
    </tr>
</table>
<label>Emergency contact information</label>
<br>
<input type='checkbox'>&nbspSame as Passenger 1</input>
<br>
<br>

<table>
    <tr>
    <td>
    <input type='text' placeholder="First Name*"></input>
    </td>
    <td class="middle1">
    <input type='text' placeholder="Last Name*"></input>
    </td>
    </tr>
    <tr>
    <td>
    <input type='email' placeholder="Email address*"></input>
    </td>
    <td class="middle1">
    <input type='text' placeholder="Phone Number*"></input>
    </td>
    </tr>
    </table>
<label style="font-weight: bold;">Bag information</label>
<br>
<label>Each passenger is allowed one free carry-on bag and one personal item. First checked bag for each passenger is also free. Second bag check fees are waived for loyalty program members. See the full bag policy.</label>

<table class="table2">
    <tr>
        <td>
            <label>Passenger 1</label>
        </td>
        <td class="tcheck"><label>Checked Bags</label></td>

    </tr>
    <tr>
        <td>
            <label>First Last</label>
        </td>
        <td class="tcheck"><input type='button' value="-" class="qty" onclick="decre()"></input><input type='text' value="0" class="qtylabel" id="bagqt"></input><input type='button' value="+" class="qty" onclick="incre()"></input></td>
    </tr>
</table>
<!-- <div>
<span>Passenger 1</span>
<span class="tcheck">Checked Bags</span>
<br>
<label>First Last</label>
<input type='button' value="-" class="tcheck"></input><input type='text' value="0" readonly></input><input type='button' value="+"></input>
</div> -->

<input type='submit' style="color:#1DB4FF; border: 1px solid #1DB4FF"></input>
</div>
</td>
</tr>
</table>
    @include('footer')
</body>
</html>
