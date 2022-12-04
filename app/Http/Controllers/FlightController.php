<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ScrapperController;

class FlightController extends Controller
{
    public function search_flight(Request $req)
    {
        if (Auth::check()) {
            $flights =  DB::table('flight_info')->where('arr', $req->arrival)->where('dep', $req->departure)->where('arr_date', $req->arrival_date)->get();
            $hotels = (new ScrapperController)->scraper_hotel($req->departure);
            $hotel_imgs = (new ScrapperController)->hotel_image($req->departure);
            $places = (new ScrapperController)->scraper_places($req->departure);
            $places_imgs = (new ScrapperController)->places_image($req->departure);
            $dest = (new ScrapperController)->city($req->departure);
            $weather = (new ScrapperController)->lat_long($dest);
            if ($req->departure_date == null) {
                return redirect('availableflights')->with(array("flight" => $flights, "arr_date" => $req->arrival_date, "adults" => $req->adults, "hotels" => $hotels, "hotel_imgs" => $hotel_imgs,"places" => $places, "places_imgs" => $places_imgs, "dest" => $dest, "humid" => $weather['humid'], "temp" => $weather['temp'], "condition" => $weather['condition']));
            } else {
                $rf = DB::table('flight_info')->where('arr', $req->departure)->where('dep', $req->arrival)->where('arr_date', $req->departure_date)->get();
                return redirect('availableflights')->with(array("flight" => $flights, "returnf" => $rf, "arr_date" => $req->arrival_date, "ret_date" => $req->departure_date, "adults" => $req->adults, "hotels" => $hotels, "hotel_imgs" => $hotel_imgs,"places" => $places, "places_imgs" => $places_imgs, "dest" => $dest, "humid" => $weather['humid'], "temp" => $weather['temp'], "condition" => $weather['condition']));
            }
        } else {
            return redirect('signup')->with('signin', "Please Sign-In first");
        }
    }
    public function select_flight(Request $req)
    {
        $flight =  DB::table('flight_info')->where('id', (int)$req->f_id)->get();
        return $flight;
    }
    public function selected_flight_return($f_id, $rf_id, $adults)
    {
        $flight =  DB::table('flight_info')->where('id', (int)$f_id)->get();
        $rflight =  DB::table('flight_info')->where('id', (int)$rf_id)->get();
        return redirect('form')->with(array("flight" => $flight, "returnf" => $rflight, "adults" => $adults));
    }
    public function selected_flight($f_id, $adults)
    {
        $flight =  DB::table('flight_info')->where('id', (int)$f_id)->get();
        return redirect('form')->with(array("flight" => $flight, "adults" => $adults));
    }


    public function confirm(Request $req)
    {
        $names = "";
        for ($i = 1; $i < $req->adults; $i++) {
            $temp_f = "f_name_" . $i;
            $temp_m = "m_name_" . $i;
            $temp_l = "l_name_" . $i;
            $name = $req->$temp_f;
            $name .= '_';
            $name .= $req->$temp_m;
            $name .= '_';
            $name .= $req->$temp_l;
            $names .= $name . ',';
        }
        $temp_f = "f_name_" . $req->adults;
        $temp_m = "m_name_" . $req->adults;
        $temp_l = "l_name_" . $req->adults;
        $name = $req->$temp_f;
        $name .= '_';
        $name .= $req->$temp_m;
        $name .= '_';
        $name .= $req->$temp_l;
        $names .= $name;

        $num0 = (rand(1, 10));
        $num1 = date("Ymd");
        $num3 = date('is');
        $randnum = $num0 . $num1 . $num3;

        $booking = new Booking();
        $booking->id = $randnum;
        $booking->email = Auth::user()->email;
        $booking->flight_id = $req->flights;
        $booking->number = $req->adults;
        $booking->passengers = $names;
        $booking->booking_date = date("Y/m/d");
        $booking->fare = $req->fare;
        $result = $booking->save();
        Session::put('bid', $randnum);
        return $result;
    }

    public function view_confirm()
    {
        $id = Session::get('bid');
        $name = Auth::user()->name;
        $flights_info = Booking::where('id', $id)->first(['flight_id']);
        $adults = Booking::where('id', $id)->first(['number']);
        $flights = explode(",", $flights_info['flight_id']);
        $flight = DB::table('flight_info')->where('id', $flights[0])->get();
        if (sizeof($flights) > 1)
            $return_flight = DB::table('flight_info')->where('id', $flights[1])->get();
        $hotels = (new ScrapperController)->scraper_hotel($flight[0]->dep);
        $imgs = (new ScrapperController)->hotel_image($flight[0]->dep);
        if (sizeof($flights) > 1) {
            $data = [
                "bid" => $id,
                "name" => $name,
                "flight" => $flight,
                "rflight" => $return_flight,
                "adults" => $adults,
                "hotels" => $hotels,
                "imgs" => $imgs,
            ];
        } else {
            $data = [
                "bid" => $id,
                "name" => $name,
                "flight" => $flight,
                "rflight" => null,
                "adults" => $adults,
                "hotels" => $hotels,
                "imgs" => $imgs,
            ];
        }
        return view('confirmation', ["data" => $data]);
    }
    public function show_bk()
    {
        $flights = array();
        $email = Auth::user()->email;
        $bk = Booking::where('email', $email)->get();
        $bk_count = $bk->count();
        for ($i = 0; $i < $bk_count; $i++) {
            $data = array();
            $f = $bk[$i]->flight_id;
            $f1 = explode(",", $f);
            $flight = DB::table('flight_info')->where('id', $f1[0])->get();
            array_push($data, $bk[$i]->id, $bk[$i]->booking_date, $flight);
            array_push($flights, $data);
            if (sizeof($f1) > 1) {
                $data = array();
                $return_flight = DB::table('flight_info')->where('id', $f1[1])->get();
                array_push($data, $bk[$i]->id, $bk[$i]->booking_date, $return_flight);
                array_push($flights, $data);
            }
        }
        return view('bookings', compact('flights'));
    }
}
