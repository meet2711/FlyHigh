<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function search_flight(Request $req)
    {
        if ($req->departure_date == null) {
            $flights =  DB::table('flight_info')->where('arr', $req->arrival)->where('dep', $req->departure)->where('arr_date', $req->arrival_date)->get();
            // $rf = DB::table('flight_info')->where('arr', $req->departure)->where('dep', $req->arrival)->where('arr_date', $req->departure_date)->get();
            return redirect('availableflights')->with(array("flight" => $flights, "arr_date" => $req->arrival_date, "ret_date" => $req->departure_date, "adults" => $req->adults));
        } else {
            $flights =  DB::table('flight_info')->where('arr', $req->arrival)->where('dep', $req->departure)->where('arr_date', $req->arrival_date)->get();
            $rf = DB::table('flight_info')->where('arr', $req->departure)->where('dep', $req->arrival)->where('arr_date', $req->departure_date)->get();
            return redirect('availableflights')->with(array("flight" => $flights, "returnf" => $rf, "arr_date" => $req->arrival_date, "ret_date" => $req->departure_date, "adults" => $req->adults));
        }
        // $queryString = http_build_query([
        //     'access_key' => 'ff82bb06e2b49ab1c0ff513bf12091d0'
        // ]);

        // $ch = curl_init(sprintf('%s?%s', 'https://api.aviationstack.com/v1/flights', $queryString));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $json = curl_exec($ch);
        // curl_close($ch);

        // $api_result = json_decode($json, true);
        // return $api_result;
    }

    public function select_flight(Request $req)
    {
        $flight =  DB::table('flight_info')->where('id', (int)$req->f_id)->get();
        return $flight;
    }
    public function selected_flight($f_id, $rf_id, $adults)
    {
        $flight =  DB::table('flight_info')->where('id', (int)$f_id)->get();
        $rflight =  DB::table('flight_info')->where('id', (int)$rf_id)->get();
        return redirect('form')->with(array("flight" => $flight, "returnf" => $rflight, "adults" => $adults));
    }
}
