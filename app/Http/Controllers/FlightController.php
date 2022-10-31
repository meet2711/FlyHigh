<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function search_flight(Request $req)
    {
        $flights =  DB::table('flight_info')->where('arr', $req->arrival)->where('dep', $req->departure)->where('arr_date', $req->arrival_date)->where('dep_date', $req->departure_date)->get();
        // return redirect()->route('availablefights',  [$flights]);
        // return view('availableflights', ["flights" => $flights]);
        // return $req;
        return redirect('availableflights')->with("flight", $flights);
    }
}
