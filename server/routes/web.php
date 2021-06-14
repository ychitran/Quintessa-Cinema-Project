<?php

use App\Http\Controllers\AdminController;
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

Route::group(['prefix' =>'admin','middleware' => 'checkpermission'], function() {
    Route::get('/',[AdminController::class,'homeAdmin'])->name('admin.home');

    // Manage Film
    Route::get('/managefilm',[AdminController::class,'manageFilm'])->name('admin.managefilm');
    Route::get('/addfilm',[AdminController::class,'addFilmPage'])->name('admin.addfilm.page');
    Route::post('/addfilm',[AdminController::class,'addFilm'])->name('admin.addfilm');
    Route::get('/editfilm/{id}',[AdminController::class,'editFilmPage'])->name('admin.editfilm.page');
    Route::post('/editfilm/{id}',[AdminController::class,'validationFilm'])->name('admin.editfilm');
    Route::get('/deletefilm/{id}',[AdminController::class,'deleteFilm'])->name('admin.deletefilm');

    //Manage Cinema
    Route::get('/managecinema',[AdminController::class,'manageCinema'])->name('admin.managecinema');
    Route::get('/addcinema',[AdminController::class,'addCinemaPage'])->name('admin.addcinema.page');
    Route::post('/addcinema',[AdminController::class,'addCinema'])->name('admin.addcinema');

    Route::get('/editcinema/{id}',[AdminController::class,'editCinemaPage'])->name('admin.editcinema.page');
    Route::post('/editcinema/{id}',[AdminController::class,'updateCinema'])->name('admin.editcinema');
    Route::get('/deletecinema/{id}',[AdminController::class,'deleteCinema'])->name('admin.deletecinema');

    //Manage Screening

    Route::get('/managescreening',[AdminController::class,'manageScreening'])->name('admin.managescreening');
    Route::get('/addscreening',[AdminController::class,'addScreeningPage'])->name('admin.addscreening.page');
    Route::post('/addscreening',[AdminController::class,'addScreening'])->name('admin.addscreening');
    Route::get('/editscreening/{id}',[AdminController::class,'editScreeningPage'])->name('admin.editscreening.page');
    Route::post('/editscreening/{id}',[AdminController::class,'editScreening'])->name('admin.editscreening');
    Route::delete('/deletescreening/{id}',[AdminController::class,'deleteScreeningPage'])->name('admin.deletescreening');


});


Route::get('{any}', function () {
    return view('client');
})->where('any','.*');
