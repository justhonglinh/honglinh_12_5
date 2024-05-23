<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{

    function viewHome()
    {

        $data = DB::table('users')
            ->join('position', 'users.position', '=', 'position.id')
            ->join('level', 'users.level', '=', 'level.id')
            ->join('working_times', 'users.id', '=', 'working_times.employee_id')
            ->select('users.*','working_times.id as working_times_id', 'working_times.start_time', 'working_times.end_time', 'position.position_name', 'level.level_name')
            ->get();

        // Trả về kết quả
        return view('manager.analytics',['data' => $data] ,compact('hours', 'minutes'));
    }

    function check_delete($id)
    {
        DB::table('working_times')->delete($id);
        return redirect('/manager/analytics');
    }
}
