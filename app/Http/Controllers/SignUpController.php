<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function insert(Request $request)
    {
        // dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = "https://www.linkpicture.com/q/user_10.png";
        $user->password = Hash::make($request->password);

        $user->save();
        Auth::login($user, true);
        return 1;
    }

    public function login(Request $req)
    {
        $user = User::where('email', '=', $req->email)->first();
        if (!empty($user)) {
            if (Hash::check($req->password, $user->password)) {
                Auth::login($user, true);
                return 0;
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
}
