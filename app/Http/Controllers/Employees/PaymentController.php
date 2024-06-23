<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{


    public function showPayment()
    {
        $user = Auth::user();

        $level = DB::table('level')->where('id', '=', $user->level)->first();
        $position = DB::table('position')->where('id','=',$user->position)->first() ;
        $payment = DB::table('payments')->where('employee_salary_id' , '=' , $user->id)->get();

        return view('employees.payment',['payment'=>$payment, 'level'=>$level, 'position'=>$position]);
    }
}
