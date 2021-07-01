<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CinemasController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\OrderTicketController;
use App\Http\Controllers\RemarkableController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ScreeningsController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TicketDetailController;
use App\Http\Controllers\TicketPriceController;
use App\Models\Film;
use App\Models\Order;
use App\Models\TicketDetail;

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
//USER CONTROLLER
Route::get('/',[FilmsController::class,'listFilm']);
Route::get('/remarkable',[RemarkableController::class,'enableRemarkable']);

//Profile Member
Route::get('/profile/{id}',[MembersController::class,'profileMember']);
Route::get('/orderticketmember/{id}',[MembersController::class,'orderTicketOfMember']);
//Modal Order Ticket
Route::get('/details-film/{id}',[FilmsController::class,'editFilm']);
Route::get('/screeningdate/{film_id}',[ScreeningsController::class,'getScreeningOfFilm']);
Route::get('/screeningtime/{film_id}/{date}',[ScreeningsController::class,'getTimeOfDate']);
Route::get('/screeningroom/{film_id}/{date}/{start_time}',[ScreeningsController::class,'getRoomOfScreening']);
Route::get('/screeningid/{film_id}/{date}/{start_time}/{room_id}',[ScreeningsController::class,'getScreeningId']);
Route::get('/screeningseat/{room_id}/{screening_id}',[OrderTicketController::class,'getSeat']);
Route::get('/film-price/{film_id}',[FilmsController::class,'filmPrice']);
Route::post('/orderticket',[OrderTicketController::class,'storeOrderTicket']);




//,'middleware' => 'checkpermission'
Route::group(['prefix' =>'admin'], function() {
    Route::get('/',[AdminController::class,'homeAdmin'])->name('admin.home');

    // Manage Film

    //,'middleware' => 'administrator'
    Route::get('/films',[FilmsController::class,'manageFilm']);
    Route::group(['prefix' => 'films'], function() {
    Route::get('/add',[FilmsController::class,'createFilm']);
    Route::post('/add',[FilmsController::class,'storeFilm']);
    Route::get('/edit/{id}',[FilmsController::class,'editFilm']);
    Route::put('/edit/{id}',[FilmsController::class,'updateFilm']);
    Route::get('/{id}',[FilmsController::class,'deleteFilm']);
    });
    //Manage Cinema
    Route::get('/cinemas',[CinemasController::class,'manageCinema']);

    //,'middleware' => 'administrator'
    Route::group(['prefix' => 'cinemas'], function() {
    Route::get('/create',[CinemasController::class,'createCinema']);
    Route::post('/add',[CinemasController::class,'storeCinema']);

    Route::get('/edit/{id}',[CinemasController::class,'editCinema']);
    Route::put('/edit/{id}',[CinemasController::class,'updateCinema']);
    Route::get('/{id}',[CinemasController::class,'deleteCinema']);
    });
    //Manage Screening

    Route::get('/screenings',[ScreeningsController::class,'manageScreening']);
    Route::get('/screenings/{film_id}',[ScreeningsController::class,'getScreeningOfFilm']);

    //,'middleware' => 'manager'
    Route::group(['prefix' => 'screenings'], function() {
    // Route::get('/add',[ScreeningsController::class,'createScreening']);
    Route::post('/add',[ScreeningsController::class,'storeScreening']);
    Route::get('/edit/{id}',[ScreeningsController::class,'editScreening']);
    Route::put('/edit/{id}',[ScreeningsController::class,'updateScreening']);
    Route::delete('/delete/{id}',[ScreeningsController::class,'deleteScreening']);
    });
    //Manager Staff
    Route::get('/staff',[StaffsController::class,'manageStaff'])->name('admin.managestaff');
    
    Route::group(['prefix' => 'staff'], function() {
    Route::get('/create',[StaffsController::class,'createStaff'])->name('admin.addstaff.page');
    Route::post('/create',[StaffsController::class,'storeStaff'])->name('admin.addstaff');
    Route::get('/edit/{id}',[StaffsController::class,'editStaff']);
    Route::post('/edit/{id}',[StaffsController::class,'updateStaff']);
    Route::get('/delete/{id}',[StaffsController::class,'deleteStaff']);
    });
    //Manager Advertisement
    Route::get('/advertisement',[AdvertisementsController::class,'manageAds']);

    Route::group(['prefix' => 'advertisement','middleware' => 'administrator'], function() {
    Route::get('/create',[AdvertisementsController::class,'createAd']);
    Route::post('/create',[AdvertisementsController::class,'storeAd']);
    Route::get('/edit/{id}',[AdvertisementsController::class,'editAd']);
    Route::post('/edit/{id}',[AdvertisementsController::class,'updateAd']);
    Route::get('/delete/{id}',[AdvertisementsController::class,'deleteAd']);
    });

    //manager Room
    Route::get('/rooms',[RoomsController::class,'manageRoom']);
    
    Route::group(['prefix' => 'room','middleware' => 'administrator'], function() {
    Route::get('/create',[RoomsController::class,'createRoom']);
    Route::post('/create',[RoomsController::class,'storeRoom']);
    Route::get('/edit/{id}',[RoomsController::class,'editRoom']);
    Route::post('/edit/{id}',[RoomsController::class,'updateRoom']);
    Route::get('/delete/{id}',[RoomsController::class,'deleteRoom']);
    });

    //manager User
    Route::get('/member',[MembersController::class,'manageMember']);
    
    Route::group(['prefix' => 'member','middleware' => 'manager'], function() {
    Route::get('/create',[MembersController::class,'createMember']);
    Route::post('/create',[MembersController::class,'storeMember']);
    Route::get('/edit/{id}',[MembersController::class,'editMember']);
    Route::post('/edit/{id}',[MembersController::class,'updateMember']);
    Route::get('/delete/{id}',[MembersController::class,'deleteMember']);
    });

    //manager Combo
    Route::get('/combo',[CombosController::class,'manageCombo']);
    
    Route::group(['prefix' => 'combo','middleware' => 'manager'], function() {
    Route::get('/create',[CombosController::class,'createCombo']);
    Route::post('/create',[CombosController::class,'storeCombo']);
    Route::get('/edit/{id}',[CombosController::class,'editCombo']);
    Route::post('/edit/{id}',[CombosController::class,'updateCombo']);
    Route::get('/delete/{id}',[CombosController::class,'deleteCombo']);
    });

    //Manager Ticket Price
    Route::get('/ticket-prices',[TicketPriceController::class,'managePrice']);
    
    Route::group(['prefix' => 'ticket-price'], function() {
    // Route::get('/create',[CombosController::class,'createCombo']);
    // Route::post('/create',[CombosController::class,'storeCombo']);
    Route::get('/edit/{id}',[TicketPriceController::class,'edit']);
    Route::post('/edit/{id}',[TicketPriceController::class,'update']);
    // Route::get('/delete/{id}',[CombosController::class,'deleteCombo']);
    });


    //manage Ticket
    Route::get('/tickets',[TicketDetailController::class,'manageTicket']);
    
    Route::group(['prefix' => 'tickets'], function() {
    Route::get('/order',[TicketDetailController::class,'orderTicket']);
    // Route::post('/create',[CombosController::class,'storeCombo']);
    Route::get('/edit/{id}',[TicketPriceController::class,'edit']);
    Route::post('/edit/{id}',[TicketPriceController::class,'update']);
    // Route::get('/delete/{id}',[CombosController::class,'deleteCombo']);
    });

    //Remarkable 
    Route::group(['prefix'=> 'remarkables'], function(){
        Route::get('/add',[RemarkableController::class,'createRemarkable']);
        Route::post('/add',[RemarkableController::class,'storeRemarkable']);

    });

});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
