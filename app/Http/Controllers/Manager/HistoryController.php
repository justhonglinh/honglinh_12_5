<?php

namespace App\Http\Controllers\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{

    function viewHome()
    {

        $data = DB::table('users')
            ->join('position', 'users.position', '=', 'position.id')
            ->join('level', 'users.level', '=', 'level.id')
            ->join('working_times', 'users.id', '=', 'working_times.employee_id')
            ->select('users.*','working_times.id as working_times_id', 'working_times.start_time', 'working_times.end_time','working_times.total', 'position.position_name', 'level.level_name')
            ->get();

        // Trả về kết quả
        return view('manager.analytics',['data' => $data]);
    }

    function check_delete($id)
    {
        DB::table('working_times')->delete($id);
        return redirect('/manager/analytics');
    }
}
