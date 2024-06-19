<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
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
            ->join('working_times', 'users.id', '=', 'working_times.employee_id')
            ->select('users.*', 'position.position_name', 'level.level_name', 'working_times.*')
            ->where('working_times.status', '=', '1')
            ->get();
            return view('manager.check_work', ['users' => $users,'level'=>$level,'position'=>$position]);

    }

    function confirm($id )
    {
        DB::table('working_times')
            ->where('id','=',$id)
            ->update([
                'status' => '2'
            ]);

        return redirect('/manager/check_work')->with('check', 'check successful');

    }

    function cancel($id)
    {
        DB::table('working_times')
            ->where('id','=',$id)
            ->update([
                'status' => '0'
            ]);
        return redirect('/manager/check_work')->with('check', 'check was cancel');

    }

}
