<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('logout',[HomeController::class,'logout']);

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    
    //List of companies
    Route::get('companies',[CompanieController::class,'index'])->name('companies');
    
    //Create company view
    Route::get('company/create',[CompanieController::class,'create']);
    
    //save new company
    Route::post('company/store',[CompanieController::class,'store']);
    
    
    
    //show one compamy
    Route::get('company/show/{id}',[CompanieController::class,'show'])->name('company');
    
    //Update company
    Route::get('company/edit/{id}',[CompanieController::class,'edit']);
    
    //Validate edit
    Route::post('company/update/{id}',[CompanieController::class,'update']);
    //Delete Company
    Route::get('company/delete/{id}',[CompanieController::class, 'destroy']);
    
    
    // ===========================================================
    
    //List Emplyees
    Route::get('employees',[EmployeeController::class,'index']);
    
    //Create Employe
    Route::get('employe/create',[EmployeeController::class,'create']);
    
    
    //Validate 
    Route::post('empolyee/store',[EmployeeController::class,'store']);
    
    //Show EMploye
    Route::get('employe/show/{id}',[EmployeeController::class,'show']);
    
    
    //Update Employe
    Route::get('employe/edit/{id}',[EmployeeController::class,'edit']);
    
    //validate update 
    Route::post('empolyee/update/{id}',[EmployeeController::class,'update']);
    
    //Delete User
    Route::get('employe/delete/{id}',[EmployeeController::class,'destroy']);
    
});