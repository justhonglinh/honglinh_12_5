<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    function viewPosition()
    {
        $position = DB::table('position')->get();
        return view('manager.position', ['position' => $position]);
    }
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
