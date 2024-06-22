<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    function viewHome()
    {
        // Lấy thông tin người dùng đang xác thực
        $user = Auth::user();

        // Truy vấn dữ liệu từ bảng 'working_times' dựa trên employee_id của người dùng

        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentDay = $currentDate->day;
        $currentMonth = $currentDate->month;

        $history = DB::table('working_times')
            ->whereDay('created_at', '=', $currentDay)
            ->where('employee_id', '=', $user->id)
            ->first();


        $total = DB::table('working_times')
            ->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->sum('total');        // Truy vấn dữ liệu từ bảng 'level' dựa trên level_id của người dùng

        $level = DB::table('level')->where('id', '=', $user->level)->first();
        $position = DB::table('position')->where('id','=',$user->position)->first() ;

        $day = DB::table('working_times')
            ->whereDay('created_at','=',$currentDay)
            ->whereMonth('created_at','=',$currentMonth)
            ->whereDay('created_at','=',$currentDay)
            ->where('employee_id','=',$user->id )
            ->first();
        return view('employees.home', ['history' => $history,'total'=>$total,'day'=>$day,'level' => $level,'position'=>$position]);
    }
}
