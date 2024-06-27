<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView(){
        return view("login.index");
    }

    public function loginCheck(Request $request){
        $request->validate([
           "email"=>"required|email",
           "password"=>"required|min:8"
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect(route("dashboard"));
        }else{
            return redirect(route('login'));
        }

    }

    public function logout(){
        Auth::logout();
        return view("login.index");
    }
}
