<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //GET:login
    function viewLogin()
    {
        // Kiem tra xem da dang nhap hay chua ?
        if (Auth::check()) {
            // Da dang nhap
            $user = Auth::user();
            switch ($user->role) {
                case 'manager':
                    return redirect()->route('manager.home');
                    break;
                case 'employees':
                    return redirect()->route('employees.home');
                    break;
                case 'super_admin' :
                    return redirect()->route('super_admin.home');
                    break ;
            }
        }
        // view dang nhap
        return view('auth.login');
    }

    //POST:login
    function login(Request $request)
    {
        //xu ly thong tin
        $email = $request->get('email') ;
        $password = $request->get('password') ;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            //check role
            $user = Auth::user() ;
            switch ($user->role){
                case 'manager' :
                    return redirect()->route('manager.home');
                    break ;
                case 'employees' :
                    return redirect()->route('employees.home');
                    break ;
                case 'super_admin' :
                    return redirect()->route('super_admin.home');
                    break ;
            }
        }else{
            return redirect()->back() ;
        }
    }

    //post:/logout
    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
