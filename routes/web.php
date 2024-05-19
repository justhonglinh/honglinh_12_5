<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
//login
Route::get('/login' , [\App\Http\Controllers\AuthController::class,'viewLogin'])->name('login') ;
Route::post('/login' , [\App\Http\Controllers\AuthController::class,'login']) ;
Route::post('/logout' , [\App\Http\Controllers\AuthController::class,'logout'])->name('logout') ;

//home page
Route::get('/super_admin/home', function (){
    return view('super_admin.home') ;
})->middleware('auth')->name('super_admin.home') ;


//manager page
Route::get('/manager/home',[\App\Http\Controllers\ManagerController::class,'viewHome']
)->middleware('auth')->name('manager.home');

Route::get('/manager/employees',[\App\Http\Controllers\ManagerController::class,'viewHome']
)->name('manager.home');

Route::get('/manager/level',[\App\Http\Controllers\ManagerController::class,'viewLevel']
)->name('manager.level');

Route::get('/manager/position',[\App\Http\Controllers\ManagerController::class,'viewPosition']
)->name('manager.position');
//employees
Route::post('/manager/employees/add',[\App\Http\Controllers\ManagerController::class,'addEmployees'])->name('process-add-employees') ;
Route::get('/manager/employees/delete/{id}',[\App\Http\Controllers\ManagerController::class,'deleteEmployees'])->name('process-delete-employees') ;
Route::post('/manager/employees/edit/{id}',[\App\Http\Controllers\ManagerController::class,'processEditEmployees'])->name('process-edit-employees') ;
//level
Route::post('/manager/level/add',[\App\Http\Controllers\ManagerController::class,'addLevel'])->name('process-add-level') ;
Route::get('/manager/level/delete/{id}',[\App\Http\Controllers\ManagerController::class,'deleteLevel'])->name('process-delete-level') ;
Route::post('/manager/level/edit/{id}',[\App\Http\Controllers\ManagerController::class,'processEditLevel'])->name('process-edit-level') ;
//position
Route::post('/manager/position/add',[\App\Http\Controllers\ManagerController::class,'addPosition'])->name('process-add-position') ;
Route::get('/manager/position/delete/{id}',[\App\Http\Controllers\ManagerController::class,'deletePosition'])->name('process-delete-position') ;
Route::post('/manager/position/edit/{id}',[\App\Http\Controllers\ManagerController::class,'processEditPosition'])->name('process-edit-position') ;
//chcek work
Route::get('/manager/working_times',[\App\Http\Controllers\CheckWorkController::class,'viewHome']) ;
Route::post('/manager/working_times/check/{id}',[\App\Http\Controllers\CheckWorkController::class,'check']) ;


Route::get('/manager/analytics',[\App\Http\Controllers\AnalyticsController::class,'viewHome']) ;

//employees page
Route::get('/employees/home', function () {
    return view('employees.home');
})->name('employees.home');

Route::get('/employees',[\App\Http\Controllers\EmployeeController::class,'viewIndex']) ;

