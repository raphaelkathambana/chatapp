<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class ReportController extends Controller
{
    public function getUsers(Request $request) {
        $users = DB::select('select * from users');        
        return view('home', ['users' => $users]);
    }

    public function getExcel() {
        $users = DB::select('select * from users');        
        return (new FastExcel($users))->download('user_report.xlsx');
    }
}
