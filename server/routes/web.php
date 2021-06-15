<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertisementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CinemasController;
use App\Http\Controllers\CombosController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ScreeningsController;
use App\Http\Controllers\StaffsController;
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
    Route::get('/film',[FilmsController::class,'manageFilm'])->name('admin.managefilm');
    Route::group(['prefix' => 'film','middleware' => 'administrator'], function() {
    Route::get('/create',[FilmsController::class,'createFilm'])->name('admin.addfilm.page');
    Route::post('/store',[FilmsController::class,'storeFilm'])->name('admin.addfilm');
    Route::get('/edit/{id}',[FilmsController::class,'editFilm'])->name('admin.editfilm.page');
    Route::post('/update/{id}',[FilmsController::class,'updateFilm'])->name('admin.editfilm');
    Route::get('/delete/{id}',[FilmsController::class,'deleteFilm'])->name('admin.deletefilm');
    });
    //Manage Cinema
    Route::get('/cinema',[CinemasController::class,'manageCinema']);
    Route::group(['prefix' => 'cinema','middleware' => 'administrator'], function() {
    Route::get('/create',[CinemasController::class,'createCinema']);
    Route::post('/store',[CinemasController::class,'storeCinema']);

    Route::get('edit/{id}',[CinemasController::class,'editCinema']);
    Route::post('update//{id}',[CinemasController::class,'updateCinema']);
    Route::get('/delete/{id}',[CinemasController::class,'deleteCinema']);
    });
    //Manage Screening

    Route::get('/screening',[ScreeningsController::class,'manageScreening'])->name('admin.managescreening');
    
    Route::group(['prefix' => 'screening','middleware' => 'manager'], function() {
    Route::get('/create',[ScreeningsController::class,'createScreening']);
    Route::post('/store',[ScreeningsController::class,'storeScreening']);
    Route::get('/edit/{id}',[ScreeningsController::class,'editScreening']);
    Route::post('/update/{id}',[ScreeningsController::class,'updateScreening']);
    Route::delete('/delete/{id}',[ScreeningsController::class,'deleteScreening']);
    });
    //Manager Staff
    Route::get('/staff',[StaffsController::class,'manageStaff'])->name('admin.managestaff');
    
    Route::group(['prefix' => 'staff'], function() {
    Route::get('/create',[StaffsController::class,'createStaff'])->name('admin.addstaff.page');
    Route::post('/store',[StaffsController::class,'storeStaff'])->name('admin.addstaff');
    Route::get('/edit/{id}',[StaffsController::class,'editStaff']);
    Route::post('/update/{id}',[StaffsController::class,'updateStaff']);
    Route::get('/delete/{id}',[StaffsController::class,'deleteStaff']);
    });
    //Manager Advertisement
    Route::get('/advertisement',[AdvertisementsController::class,'manageAds']);

    Route::group(['prefix' => 'advertisement','middleware' => 'administrator'], function() {
    Route::get('/create',[AdvertisementsController::class,'createAd']);
    Route::post('/store',[AdvertisementsController::class,'storeAd']);
    Route::get('/edit/{id}',[AdvertisementsController::class,'editAd']);
    Route::post('/update/{id}',[AdvertisementsController::class,'updateAd']);
    Route::get('/delete/{id}',[AdvertisementsController::class,'deleteAd']);
    });

    //manager Room
    Route::get('/room',[RoomsController::class,'manageRoom']);
    
    Route::group(['prefix' => 'room','middleware' => 'manager'], function() {
    Route::get('/create',[RoomsController::class,'createRoom']);
    Route::post('/store',[RoomsController::class,'storeRoom']);
    Route::get('/edit/{id}',[RoomsController::class,'editRoom']);
    Route::post('/update/{id}',[RoomsController::class,'updateRoom']);
    Route::get('/delete/{id}',[RoomsController::class,'deleteRoom']);
    });

    //manager User
    Route::get('/member',[MembersController::class,'manageMember']);
    
    Route::group(['prefix' => 'member','middleware' => 'manager'], function() {
    Route::get('/create',[MembersController::class,'createMember']);
    Route::post('/store',[MembersController::class,'storeMember']);
    Route::get('/edit/{id}',[MembersController::class,'editMember']);
    Route::post('/update/{id}',[MembersController::class,'updateMember']);
    Route::get('/delete/{id}',[MembersController::class,'deleteMember']);
    });

    //manager Combo
    Route::get('/combo',[CombosController::class,'manageCombo']);
    
    Route::group(['prefix' => 'combo','middleware' => 'administrator'], function() {
    Route::get('/create',[CombosController::class,'createCombo']);
    Route::post('/store',[CombosController::class,'storeCombo']);
    Route::get('/edit/{id}',[CombosController::class,'editCombo']);
    Route::post('/update/{id}',[CombosController::class,'updateCombo']);
    Route::get('/delete/{id}',[CombosController::class,'deleteCombo']);
    });
});


Route::get('{any}', function () {
    return view('client');
})->where('any','.*');
