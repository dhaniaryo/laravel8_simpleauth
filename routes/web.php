<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[AuthController::class,'showFormLogin'])->name('login');             //first page must be login page
Route::get('login',[AuthController::class,'showFormLogin'])->name('login');         //form login
Route::post('login',[AuthController::class,'login']);                               //process login
Route::get('register',[AuthController::class,'showFormRegister'])->name('register'); //form register 
Route::post('register',[AuthController::class,'register']);                          //process register

Route::group(['middleware' => 'auth'], function(){                                  //home and logout page can be access after login
    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});