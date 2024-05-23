<?php

namespace App\Http\Controllers;

use Database\Seeders\DatabaseSeeder;
use Carbon\Carbon;
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
        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::parse($request->input('end_time'));
        $timeDifference = $endTime->diffInSeconds($startTime);

        $hours = floor($timeDifference / 3600);
        $minutes = floor(($timeDifference % 3600) / 60);

        $newHours = $hours + ($minutes >= 45 ? 1 : 0.5);

        DB::table('working_times')->insert([
            'employee_id' => $id ,
           'start_time' => $startTime,
            'end_time' => $endTime,
            'total' => $newHours ,
            'created_at' => now()
        ]);

        return redirect("/manager/working_times") ;
    }

}
