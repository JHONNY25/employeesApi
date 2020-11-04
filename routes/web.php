<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('/employees', [EmployeesController::class,'index'])->name('getEmployees');
Route::get('/getEmployee/{id}', [EmployeesController::class,'getEmployee'])->name('getEmployee');
Route::post('/create-employees', [EmployeesController::class,'create'])->name('createEmployees');
