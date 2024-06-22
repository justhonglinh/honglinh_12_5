<?php

namespace App\Http\Controllers\Employees;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    function showHistory()
    {
        $user = Auth::user();

        // Truy vấn dữ liệu từ bảng 'working_times' dựa trên employee_id của người dùng

        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;

        $perPage = 31; // Số bản ghi hiển thị trên mỗi trang

        $history = DB::table('working_times')
            ->whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo giảm dần
            ->paginate($perPage);
        $level = DB::table('level')->where('id', '=', $user->level)->first();
        $position = DB::table('position')->where('id','=',$user->position)->first() ;
        return view('employees.history', ['history' => $history,'level'=>$level,'position'=>$position]);

    }

}
