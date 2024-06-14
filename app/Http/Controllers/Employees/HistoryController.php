<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    function showHistory()
    {
        $user = Auth::user();

        // Truy vấn dữ liệu từ bảng 'working_times' dựa trên employee_id của người dùng
        $history = DB::table('working_times')
            ->where('employee_id','=', $user->id)
            ->get();

        $level = DB::table('level')->where('id', '=', $user->level)->get();
        $position = DB::table('position')->where('id','=',$user->position)->get() ;
        return view('employees.history', ['history' => $history,'level'=>$level,'position'=>$position]);

    }

}
