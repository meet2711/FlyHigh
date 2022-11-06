<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class SignUpController extends Controller
{
    public function insert(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = "https://www.linkpicture.com/q/user_10.png";
        $user->password = $request->password;

        $user->save();
        Auth::login($user, true);
        return 1;
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
}
