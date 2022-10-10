<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function home()
    {
        return DB::table('flight_info')->select('id','arr','dep','arr_time','dep_time')->get();
    }
    
}
