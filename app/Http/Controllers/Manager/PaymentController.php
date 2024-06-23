<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    public function viewPayment()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $users = DB::table('users')
            ->join('bank_information', 'users.id', '=', 'bank_information.employee_id')
            ->select(
                'users.id',
                'users.name',
                'bank_information.bank_name',
                'bank_information.bank_number'
            )
            ->get();

        $payments = DB::table('payments')
            ->whereMonth('created_at', '=', $currentMonth)
            ->get();

        $usersWithPayments = [];
        foreach ($users as $user) {
            $userPayments = $payments->filter(function ($payment) use ($user) {
                return $payment->employee_salary_id == $user->id;
            });
            if ($userPayments->count() == 0) {
                $usersWithPayments[] = $user;
            }
        }

        return view('manager.payment', [
            'users' => $usersWithPayments,
            'month' => $currentMonth
        ]);
    }

    function viewSettlement($id)
    {
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;

        $user = DB::table('users')->where('id', '=', $id)->first();
        $level = DB::table('level')->where('id', '=', $user->level)->first();
        $position = DB::table('position')->where('id', '=', $user->position)->first();

        $times = DB::table('working_times')
            ->whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->where('status','=','2')
            ->where('employee_id','=',$id)
            ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo giảm dần
            ->paginate(10);

        $bank = DB::table('bank_information')
            ->where('employee_id','=',$id) ->first();

        $total = DB::table('working_times')
            ->whereYear('created_at', '=', $currentYear)
            ->whereMonth('created_at', '=', $currentMonth)
            ->where('status','=','2')
            ->where('employee_id','=',$id)
            ->sum('total');


        return view('manager.settlement',['times'=>$times ,'users' => $id,'level'=>$level,'position'=>$position,'total' => $total , 'bank'=>$bank]) ;
    }

    function confirm($id, $amount)
    {
        DB::table('payments')->insert([
            'employee_salary_id' => $id ,
            'total_salary' => $amount ,
            'status' => '2' ,
            'created_at' => now()
        ]) ;
        return redirect('/manager/payment')->with( 'Pay Success');

    }
}
