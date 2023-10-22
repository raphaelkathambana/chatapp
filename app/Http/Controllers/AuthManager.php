<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    public function signup() {
        return view("SignUp");
    }

    public function signin() {
        return view("SignIn");
    }

    public function signupPost(Request $request) {
        $request ->validate([
            "email"=> "required|email|unique:users",
            "password"=> "required",
            "firstname" => "required",
            "lastname" => "required"
        ]);

        $data["name"] = $request -> firstname . " " . $request -> lastname;
        $data["email"] = $request -> email;
        $data["password"] = Hash::make($request -> password);
        $user = User::create($data);
        if(! $user) {
            return redirect(route("signup"))->with("error","Sign up failed, please try again.");
        }
        Auth::login($user);
        return redirect("/SetAvatar")->with("success","sign up successful");
    }

    public function signinPost(Request $request) {

    }
}
