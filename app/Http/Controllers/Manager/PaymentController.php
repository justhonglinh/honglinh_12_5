<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    public function viewPayment()
    {
        $users = DB::table('users')
            ->join('bank_information', 'users.id', '=', 'bank_information.employee_id')
            ->join('position','users.position','=','position.id')
            ->join('working_times','users.id','=','working_times.employee_id')
            ->get();
        return view('manager.payment', ['users' => $users]);
    }
}
