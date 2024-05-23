<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    function viewHome()
    {

        $level = DB::table('level')->get() ;
        $position = DB::table('position')->get() ;


        $users = DB::table('users')
            ->join('position', 'users.position', '=', 'position.id')
            ->join('level', 'users.level', '=', 'level.id')
            ->select('users.*', 'position.position_name', 'level.level_name')
            ->get();

        return view('manager.home', ['users' => $users,'level'=>$level,'position'=>$position]);
    }

    function addEmployees(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $gender = $request->get('gender');
        $position = $request->get('position');
        $level = $request->get('level');
        $password = Hash::make($request->get('password'));

        $avatar_file = $request->file('avatar_url');
        $newNameFile = time() . "_" . $avatar_file->getClientOriginalName();
        $avatar_file->storeAs('public/images', $newNameFile);
        $avatar_url = asset('storage/images/' . $newNameFile);

        $employees = DB::table('users')->insert([
            'name' => $name,
            'avatar_url' => $avatar_url,
            'email' => $email,
            'password' => $password,
            'address' => $address,
            'phone' => $phone,
            'gender' => $gender,
            'position' => $position,
            'level' => $level,
            'role' => "employees",

            'created_at' => now(),
        ]);
        if ($employees == false) {
            dd("Thất bại!");
        }
        return redirect('/manager/home');

    }
    function deleteEmployees($id)
    {
        DB::table('users')->delete($id);
        return redirect('/manager/home');
    }
    function processEditEmployees($id, Request $request)
    {
        $name = $request->get('name');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $gender = $request->get('gender');
        $position = $request->get('position');
        $level = $request->get('level');

        $avatar_file = $request->file('avatar_url');
        $newNameFile = time() . "_" . $avatar_file->getClientOriginalName();
        $avatar_file->storeAs('public/images', $newNameFile);
        $avatar_url = asset('storage/images/' . $newNameFile);

        DB::table('users')
            ->where('id', '=', $id)
            ->update([
                'name' => $name,
                'avatar_url' => $avatar_url,
                'phone' => $phone,
                'address' => $address,
                'gender' => $gender,
                'position' => $position,
                'level' => $level,

                'role' => "employees",

                'updated_at' => now(),
            ]);

        return redirect('/manager/home');
    }
}
