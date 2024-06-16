<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
//process level
    function viewLevel()
    {
        $level = DB::table('level')->get();
        return view('manager.level', ['level' => $level]);
    }
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
}
