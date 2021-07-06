<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Room;
use App\Models\Screening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScreeningsController extends Controller
{
	public function getScreeningOfFilm($id,$cinema_id) {
		$screenings = DB::table('screenings')
		->where('screenings.film_id',$id)
		->where('screenings.cinema_id',$cinema_id)
		->leftJoin('films','screenings.film_id','=','films.id')
		->leftJoin('rooms','screenings.room_id','=','rooms.id')
		->select('screenings.*','films.global_name as global_name','rooms.room_name as room_name')
		->get();
		return response()->json($screenings);
	}

	public function getTimeOfDate($film_id,$date,$cinema_id){
		$screenings = Screening::select('start_time')
		->where('film_id',$film_id)
		->where('date',$date)
		->where('cinema_id',$cinema_id)
		->groupBy('start_time')
		->get();
		return response()->json($screenings);
	}

	public function getRoomOfScreening($film_id,$date, $start_time,$cinema_id) {
		$screenings = Screening::select('room_id')
		->where('film_id',$film_id)
		->where('cinema_id',$cinema_id)
		->where('date',$date)
		->where('start_time',$start_time)
		->groupBy('room_id')
		->get();
		return response()->json($screenings);
	}

	public function getScreeningId($film_id,$date, $start_time,$room_id,$cinema_id){
		$screening_id = Screening::select('id')
		->where('film_id',$film_id)
		->where('cinema_id',$cinema_id)
		->where('date',$date)
		->where('start_time',$start_time)
		->where('room_id',$room_id)
		->first();
		return response()->json($screening_id);
	}


    public function manageScreening()
	{
		$screenings = DB::table('screenings')
		->leftJoin('films',"screenings.film_id","=","films.id")
		->leftJoin('rooms','screenings.room_id','=','rooms.id')
		->select('screenings.*','films.global_name as global_name',"rooms.room_name as room_name")
		->get();
		return response()->json($screenings);
	}

	public function createScreeningPage()
	{
		// $staff_id = auth()->user()->cinema_id; 
		// $films = Film::where('status',1)->get();
		// // $films = Film::all();
		// $cinema = Cinema::all();
		// $rooms = Room::where('cinema_id', $staff_id)->get();
		// return response()->json([
		// 	"films" => $films,
		// 	"cinemas" => $cinema,
		// 	"rooms" => $rooms
		// ]);
	}
	public function storeScreening(Request $request)
	{
		$screenings= new Screening();
		$screenings->film_id = $request->film_id;
		$screenings->cinema_id = 1;
		$screenings->room_id = $request->room_id;
		$screenings->date = $request->date;
		$screenings->start_time = $request->start_time;
		$screenings->save();
		return ;
	}

	public function editScreening($id)
	{
		$screening = Screening::where('id',$id)->first();
		$film = Film::where('id',$screening->film_id)->first();
		$room = Room::where('id',$screening->room_id)->first();
		return response()->json([$screening,$film,$room]);
	}

	public function updateScreening(Request $request,$id)
	{
		$screenings = Screening::where('id',$id)->update([
			'date'=>$request->date,
			'start_time'=>$request->start_time
		]) ;
		return ;
	}
	public function deleteScreening($id)
	{
		Screening::where('id',$id)->delete();
		return ;
	}
}
