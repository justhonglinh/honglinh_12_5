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

        $perPage = 31; // Số bản ghi hiển thị trên mỗi trang

        $history = DB::table('working_times')
            ->whereYear('created_at', '=', $currentYear)
            ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo giảm dần
            ->paginate($perPage);

        // Truy vấn dữ liệu từ bảng 'level' dựa trên level_id của người dùng
        $level = DB::table('level')->where('id', '=', $user->level)->first();
        $position = DB::table('position')->where('id','=',$user->position)->first() ;
        return view('employees.home', ['history' => $history,'level' => $level,'position'=>$position]);
    }
}
