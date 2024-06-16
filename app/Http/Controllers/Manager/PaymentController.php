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
            ->select('users.*', 'bank_information.bank_name', 'bank_information.bank_number')
            ->get();

        return view('manager.payment', ['users' => $users]);
    }
}
