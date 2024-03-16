<?php

namespace App\Http\Controllers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckWorkController extends Controller
{
    function viewHome()
    {
            $employees = DB::table('users')->where('role', '=', 'employees')->get();
            return view('manager.check_work', ['employees' => $employees]);
    }

    function check(Request $request)
    {
        $checkin = $request->get('checkin') ;
        $checkout = $request->get('checkout') ;
        DB::table('working_time')->insert([
           'start_time' => $checkin,
            'end_time' => $checkout,
            'created_at' => now()
        ]);
    }

}
