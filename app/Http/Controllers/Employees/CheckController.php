<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{
    public function checkIn($id)
    {
        $start_time = now();
        DB::table('working_times')->insert([
            'start_time' => $start_time,
            'employee_id' => $id,
            'end_time' => '0',
            'created_at' => now() ,
            'total' => '0' ,
            'status' => '1'
        ]);

        return redirect('/employees/home')->with('success', 'Check-in successful');
    }

    public function checkOut($id)
    {
        $currentMonth = Carbon::now()->month;

        $check = DB::table('working_times')
            ->whereMonth('created_at', '=', $currentMonth)
            ->where('employee_id', '=', $id)
            ->first();

        if (!$check) {
            // Handle the case where no matching record is found
            return redirect('/employees/home')->with('error', 'No working time record found for the current month');
        }

        $end_time = now();

        $timeDifference = $end_time->diffInSeconds($check->start_time);

        $hours = floor($timeDifference / 3600);
        $minutes = floor(($timeDifference % 3600) / 60);

        if ($minutes >= 45) {
            $newHours = $hours + 1;
        } elseif ($minutes < 20) {
            $newHours = $hours;
        } else {
            $newHours = $hours + 0.5;
        }

        DB::table('working_times')
            ->where('id', $check->id)
            ->update([
                'end_time' => $end_time,
                'updated_at' => now(),
                'total' => $newHours
            ]);

        return redirect('/employees/home')->with('success', 'Check-out confirmed successfully');
    }}
