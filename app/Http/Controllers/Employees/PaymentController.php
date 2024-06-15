<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{


    public function calculateMonthlyTotals()
    {
        $currentYear = Carbon::now()->year;

        $monthlyTotals = DB::table('working_times')
            ->select(DB::raw('SUM(total) as total_month, MONTH(created_at) as month'))
            ->whereYear('created_at', '=', $currentYear)
            ->groupBy('month')
            ->get()
            ->pluck('total_month', 'month')
            ->toArray();

        return $monthlyTotals;
    }

    public function showPayment()
    {
        $user = Auth::user();

        $level = DB::table('level')->where('id', '=', $user->level)->first();
        $position = DB::table('position')->where('id','=',$user->position)->first() ;
        $monthlyTotals = $this->calculateMonthlyTotals();

        return view('Employees.payment',['monthlyTotals'=>$monthlyTotals, 'level'=>$level, 'position'=>$position]);
    }
}
