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

        $timeDifference = 0;

        foreach ($data as $row) {
            $startDateTime = Carbon::parse($row->start_time)->format('Y-m-d H:i:s');
            $endDateTime = Carbon::parse($row->end_time)->format('Y-m-d H:i:s');

            // Kiểm tra định dạng ngày giờ đầu vào
            $startTimestamp = strtotime($startDateTime);
            $endTimestamp = strtotime($endDateTime);

            // Tính khoảng thời gian
            $timeDifference += $endTimestamp - $startTimestamp;
        }

        // Chuyển đổi thành giờ, phút, giây
        $hours = floor($timeDifference / 3600);
        $minutes = floor(($timeDifference % 3600) / 60);

        // Trả về kết quả
        return view('manager.analytics',['data' => $data] ,compact('hours', 'minutes'));
    }

    function check_delete($id)
    {
        DB::table('working_times')->delete($id);
        return redirect('/manager/analytics');
    }
}
