<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function searchUser(Request $request) {
        $keyword = $request->all()["keyword"];
        if ($keyword == "") return [];
        $users = DB::select("select * from users where name LIKE ?", ["%$keyword%"]);
        return $users;
    }
}
