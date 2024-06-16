<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    function viewHome()
    {
        // Lấy thông tin người dùng đang xác thực
        $user = Auth::user();

        // Truy vấn dữ liệu từ bảng 'level' dựa trên level_id của người dùng
        $level = DB::table('level')->where('id', '=', $user->level)->first();
        $position = DB::table('position')->where('id','=',$user->position)->first() ;
        return view('employees.home', ['level' => $level,'position'=>$position]);
    }
}
