<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    function viewIndex()
    {
        // hien thong tin nhan vien
        $employees = DB::table('employees')->get() ;
        return view('employees.home',['employees' => $employees]) ;
    }


}
