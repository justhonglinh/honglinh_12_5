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

    function check($id , Request $request)
    {
        $checkin = $request->get('startDateTime') ;
        $checkout = $request->get('endDateTime') ;
        DB::table('working_times')->insert([
            'employee_id' => $id ,
           'start_time' => $checkin,
            'end_time' => $checkout,
            'created_at' => now()
        ]);
        return redirect("/manager/working_times") ;
    }

}
