<?php

use App\Http\Controllers\AuthController;
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

Route::get('/login',[AuthController::class,'loginPage'])->name('cinema.loginpage');
Route::post('/login',[AuthController::class,'login'])->name('cinema.login');
Route::get('/register',[AuthController::class,'registerPage'])->name('cinema.registerpage');
Route::post('/register',[AuthController::class,'register'])->name('cinema.register');
Route::get('/logout',[AuthController::class,'logout'])->name('cinema.logout');


Route::get('{any}', function () {
    return view('client');
})->where('any','.*');
