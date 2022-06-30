<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::redirect('/','company');


Route::resource('company',CompanyController::class)->except('show');
Route::resource('employee',EmployeeController::class)->except('show');

Route::get('custom-filter-data',[EmployeeController::class,'getCustomFilterData']);

