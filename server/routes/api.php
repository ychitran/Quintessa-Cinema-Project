<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CinemasController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\SeatController;
use App\Models\Film;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('admin/cinemas',[CinemasController::class,'manageCinema']);
Route::post('admin/cinemas/add',[CinemasController::class,'storeCinema']);
// Route::get('admin/cinemas/edit/{id}',CinemasController::class,'editCinema');

Route::get('admin/films',[FilmsController::class,'manageFilm']);
Route::get('admin/films/add',[FilmsController::class,'createFilm']);
Route::post('admin/films/add',[FilmsController::class,'storeFilm']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
