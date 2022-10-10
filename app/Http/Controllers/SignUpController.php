<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function insert(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data=array('username'=>$username,"password"=>$password);
        DB::table('users')->insert($data);
        return 1;
    }
    
}
