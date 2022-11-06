<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // public function index(){
    //     return view()
    // }

    public function search_flight(Request $req)
    {
        $flights =  DB::table('flight_info')->where('arr', $req->arrival)->where('dep', $req->departure)->where('arr_date', $req->arrival_date)->get();
        $rf = DB::table('flight_info')->where('arr', $req->departure)->where('dep', $req->arrival)->where('arr_date', $req->departure_date)->get();
        // return redirect()->route('availablefights',  [$flights]);
        // return view('availableflights', ["flights" => $flights]);
        // return $req;
        return redirect('availableflights')->with(array("flight"=> $flights, "returnf"=>$rf));
    }

    public function select_flight(Request $req){
        $flight =  DB::table('flight_info')->where('id', (int)$req->f_id)->get();
        return $flight;
    }
}