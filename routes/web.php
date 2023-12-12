<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OTPVarifyController;
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
    return view('welcome');
});


Route::get('OTP_varification',[OTPVarifyController::class,'otpview'])->name('otpview');
Route::post('otpvarify',[OTPVarifyController::class,'otpvarify'])->name('otpvarify');
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'userlogin'])->name('userlogin');
Route::get('register',[LoginController::class,'register'])->name('register');
Route::post('register',[LoginController::class,'userregister'])->name('userregister');
Route::post('logout',[LoginController::class,'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function () {
   Route::get('Dashboard',[HomeController::class,'dashboard'])->name('dashboard');
});
