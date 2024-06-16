<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{
    public function checkIn(Request $request)
    {
        DB::table('start_time')->insert([

        ]);
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
