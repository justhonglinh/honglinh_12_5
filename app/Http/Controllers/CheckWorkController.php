<?php

namespace App\Http\Controllers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckWorkController extends Controller
{
    function viewHome()
    {
            $level = DB::table('level')->get() ;
            $position = DB::table('position')->get() ;

            $users = DB::table('users')
                ->join('position', 'users.position', '=', 'position.id')
                ->join('level', 'users.level', '=', 'level.id')
                ->select('users.*', 'position.position_name', 'level.level_name')
                ->get();

            return view('manager.check_work', ['users' => $users,'level'=>$level,'position'=>$position]);

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
