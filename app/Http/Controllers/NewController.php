<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function home()
    {
        return DB::table('flight_info')->select('id', 'arr', 'dep', 'arr_time', 'dep_time')->get();
    }
    public function add(Request $req)
    {
        $result = DB::table('flight_info')->insert(['arr' => $req->arr, 'dep' => $req->dep, 'arr_time' => $req->arr_time, 'dep_time' => $req->dep_time]);
        if($result){
            return ["Result" => "Data inserted"];
        }
        else{
            return ["Result" => "ERROR"];
        }
    }

    public function delete($id){
        $result = DB::table('flight_info')->where('id', $id)->delete();
        if($result){
            return ["Result" => "Data deleted"];
        }
        else{
            return ["Result" => "ERROR"];
        }
    }

    public function update(Request $req){
        $result = DB::table('flight_info')->where('id', $req->id)->update(['arr' => $req->arr, 'dep' => $req->dep, 'arr_time' => $req->arr_time, 'dep_time' => $req->dep_time]);
        if($result){
            return ["Result" => "Data updated"];
        }
        else{
            return ["Result" => "ERROR"];
        }
    }
}
