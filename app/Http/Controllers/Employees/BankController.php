<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    function showBank()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Query the 'level' table based on the user's level_id
        $level = DB::table('level')->where('id', $user->level)->first();

        // Query the 'position' table based on the user's position_id
        $position = DB::table('position')->where('id', $user->position)->first();

        // Query the 'bank_information' table based on the user's bank_id
        $bank = DB::table('bank_information')->where('employee_id', $user->id)->first();

        return view('employees.bank_information', [
            'level' => $level,
            'position' => $position,
            'bank' => $bank
        ]);
    }

    function addBank(Request $request)
    {
        $user = Auth::user();
        $name = $request->get('name_bank');
        $number = $request->get('number_bank');

        $bank = DB::table('bank_information')->insert([
            'bank_name' => $name,
            'employee_id'=> Auth::user()->id ,
            'bank_number' => $number,
            'created_at' => now(),
        ]);
        return redirect('/employees/bank');
    }

    function editBank( Request $request)
    {
        $user = Auth::user();
        $name = $request->get('name_bank');
        $number = $request->get('number_bank');

        DB::table('bank_information')
            ->where('id', '=', $user->id)
            ->update([
                'bank_name' => $name,
                'bank_number' => $number,
                'updated_at' => now(),
            ]);

        return redirect('/employees/bank');
    }
}
