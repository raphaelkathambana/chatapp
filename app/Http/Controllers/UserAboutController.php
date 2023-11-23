<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAboutController extends Controller
{
    public function updateAbout(Request $request) {
        $about = $request -> get("about");
        $user = Auth::user();
        $user->about = $about; //Set user about field
        $user->save();
        return redirect("/profile")->with("success","About update successful");
    }
}
