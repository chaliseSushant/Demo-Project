<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});

//Home Route
Route::get('/',[HomeController::class,'index'])->name('home');

//Register Routes
Route::get('/register',[RegisterController::class,'show'])->name('register.show');
Route::post('/register/save',[RegisterController::class,'store'])->name('register.store');

//Login Routes
Route::get('/login',[LoginController::class,'show'])->name('login.show');
Route::post('/login',[LoginController::class,'login'])->name('login.perform');

Route::group(['middleware' => ['auth']],function(){
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.show');
    Route::post('/profile/save',[ProfileController::class,'store'])->name('profile.save');

    //Logout
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');

});
