<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function getUsers(Request $request) {
        $users = DB::select('select * from users');
 
        return view('home', ['users' => $users]);
    }
}