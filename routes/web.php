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
Route::get('/manager/home',[\App\Http\Controllers\Manager\ManagerController::class,'viewHome']
)->middleware('auth')->name('manager.home');

Route::get('/manager/employees',[\App\Http\Controllers\Manager\ManagerController::class,'viewHome']
)->name('manager.home');

Route::get('/manager/level',[\App\Http\Controllers\Manager\LevelController::class,'viewLevel']
)->name('manager.level');

Route::get('/manager/position',[\App\Http\Controllers\Manager\PositionController::class,'viewPosition']
)->name('manager.position');

Route::get('/manager/check_work',[\App\Http\Controllers\Manager\CheckWorkController::class,'viewHome']
)->name('manager/check_work') ;

Route::get('/manager/payment',[\App\Http\Controllers\Manager\PaymentController::class,'viewPayment']
)->name('manager/payment') ;

//employees
Route::post('/manager/employees/add',[\App\Http\Controllers\Manager\ManagerController::class,'addEmployees'])->name('process-add-employees') ;
Route::get('/manager/employees/delete/{id}',[\App\Http\Controllers\Manager\ManagerController::class,'deleteEmployees'])->name('process-delete-employees') ;
Route::post('/manager/employees/edit/{id}',[\App\Http\Controllers\Manager\ManagerController::class,'processEditEmployees'])->name('process-edit-employees') ;

//level
Route::post('/level/add',[\App\Http\Controllers\Manager\LevelController::class,'addLevel'])->name('process-add-level') ;
Route::get('/level/delete/{id}',[\App\Http\Controllers\Manager\LevelController::class,'deleteLevel'])->name('process-delete-level') ;
Route::post('/level/edit/{id}',[\App\Http\Controllers\Manager\LevelController::class,'processEditLevel'])->name('process-edit-level') ;

//position
Route::post('/position/add',[\App\Http\Controllers\Manager\PositionController::class,'addPosition'])->name('process-add-position') ;
Route::get('/position/delete/{id}',[\App\Http\Controllers\Manager\PositionController::class,'deletePosition'])->name('process-delete-position') ;
Route::post('/position/edit/{id}',[\App\Http\Controllers\Manager\PositionController::class,'processEditPosition'])->name('process-edit-position') ;

//check work
Route::post('/manager/check_work/{id}',[\App\Http\Controllers\Manager\CheckWorkController::class,'check']) ;
Route::get('/manager/history',[\App\Http\Controllers\Manager\HistoryController::class,'viewHome']) ;
Route::get('/manager/history/delete/{id}',[\App\Http\Controllers\Manager\HistoryController::class,'check_delete']) ;

#=========================================================!!!!!=====================================================================
//employees  home page
Route::get('/employees/home',[\App\Http\Controllers\Employees\EmployeesController::class,'viewHome']
)->middleware('auth')->name('employees.home');

#emp history check working page
Route::get('/employees/history',[\App\Http\Controllers\Employees\HistoryController::class,'showHistory']);
Route::get('/employees/payment',[\App\Http\Controllers\Employees\PaymentController::class,'showPayment']);
Route::get('/employees/bank',[\App\Http\Controllers\Employees\BankController::class,'showBank']);

//bank
Route::post('/bank/add',[\App\Http\Controllers\Employees\BankController::class,'addBank'])->name('process-add-bank') ;
Route::post('/bank/edit',[\App\Http\Controllers\Employees\BankController::class,'editBank'])->name('process-edit-bank') ;
// employee check in adn check out
Route::get('/working-time/check-in/{id}', [\App\Http\Controllers\Employees\CheckController::class, 'checkIn'])->name('check-in');
Route::get('/working-time/check-out/{id}', [\App\Http\Controllers\Employees\CheckController::class, 'checkOut'])->name('check-out');
// manager check confirm or cancel checking_time
Route::get('working_time/confirm/{id}',[\App\Http\Controllers\Manager\CheckWorkController::class,'confirm']) ;
Route::get('working_time/cancel/{id}',[\App\Http\Controllers\Manager\CheckWorkController::class,'cancel']) ;
