<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    function viewHome()
    {
        $employees = DB::table('users')->where('role', '=', 'employees')->get();
        return view('manager.home', ['employees' => $employees]);
    }
    function viewLevel()
    {
        $level = DB::table('level')->get();
        return view('manager.level', ['level' => $level]);
    }
    function viewPosition()
    {
        $position = DB::table('position')->get();
        return view('manager.position', ['position' => $position]);
    }
//process employees
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
        $email = $request->get('email');
        $password = $request->get('password');
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
                'email' => $email,
                'password' => $password,
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
//process level
    function addLevel(Request $request)
    {
        $level_name = $request->get('level_name');
        $factor = $request->get('factor');

        $employees = DB::table('level')->insert([
            'level_name' => $level_name,
            'level_factor' => $factor,
            'created_at' => now(),
        ]);
        if ($employees == false) {
            dd("Thất bại!");
        }
        return redirect('/manager/level');
    }
    function deleteLevel($id)
    {
        DB::table('level')->delete($id);
        return redirect('/manager/level');
    }
    function processEditLevel($id, Request $request)
    {
        $level_name = $request->get('level_name');
        $factor = $request->get('factor');

        DB::table('level')
            ->where('id', '=', $id)
            ->update([
                'level_name' => $level_name,
                'level_factor' => $factor,
                'updated_at' => now(),
            ]);

        return redirect('/manager/level');
    }
//process position
    function addPosition(Request $request)
    {
        $position_name = $request->get('position_name');
        $salary = $request->get('salary');

        $position = DB::table('position')->insert([
            'position_name' => $position_name,
            'salary' => $salary,
            'created_at' => now(),
        ]);
        if ($position == false) {
            dd("Thất bại!");
        }
        return redirect('/manager/position  ');
    }
    function deletePosition($id)
    {
        DB::table('position')->delete($id);
        return redirect('/manager/position');
    }
    function processEditPosition($id, Request $request)
    {
        $level_name = $request->get('level_name');
        $factor = $request->get('factor');

        DB::table('level')
            ->where('id', '=', $id)
            ->update([
                'level_name' => $level_name,
                'level_factor' => $factor,
                'updated_at' => now(),
            ]);

        return redirect('/manager/level');
    }
}
