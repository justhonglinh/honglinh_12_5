<?php

namespace App\Http\Controllers\Manager;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class WorkingTimeController extends Controller
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
        return view('manager.history',['data' => $data]);
    }

    function check_delete($id)
    {
        DB::table('working_times')->delete($id);
        return redirect('/manager/history');
    }

    function detail_working($id)
    {

        $users = DB::table('users')
            ->join('position', 'users.position', '=', 'position.id')
            ->join('level', 'users.level', '=', 'level.id')
            ->select('users.*', 'position.position_name', 'level.level_name')
            ->where('users.id','=',$id)
            ->first();

        $currentDate = now();
        $currentMonth = $currentDate->month;
        $currentYear = $currentDate->year;

        $working = DB::table('working_times')
            ->where('employee_id', '=', $id)
            ->whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->get();

        return view('/manager/detail_working', ['user' => $users,'working'=>$working]);
    }

    function editTotal($id, Request $request)
    {
        $total = $request->get('total');

        DB::table('working_times')
            ->where('id', '=', $id)
            ->update([
                'total' => $total,
                'updated_at' => now(),
            ]);

        return redirect()->back();
    }
}
