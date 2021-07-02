<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FormatFilm;
use App\Models\TicketPrice;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
	public function listFilm() {
		$publics = Film::where('status',1)->get();
		$unpublics = Film::where('status',0)->get();

		return response()->json([
			'publics' => $publics,
			'unpublics' => $unpublics
		]);
	}

	public function filmPrice($film_id) {
		// $price = Film::where('id',$film_id)
		// ->leftJoin('ticket_prices','films.format_id','=','ticket_prices.format_id')
		// ->select('films.*',"ticket_prices.member_price as member_prices")
		// ->first();
		$film = Film::findOrFail($film_id);
		$format_id = $film->format_id;
		$ticket = TicketPrice::findOrFail($format_id);
		$price = $ticket->member_price;
		return response()->json($price);
	}

    public function manageFilm()
	{
		
		$films = Film::orderby('id','desc')
			->leftJoin('format_films','films.format_id','=','format_films.id')
			->select('films.*','format_films.format_name as format_name')
			->get();
		return response()->json($films);
	}

    public function createFilm()
	{
		$formats = FormatFilm::all();
		return response()->json($formats);
	}
	public function storeFilm(Request $request)
	{

		$films = new Film();
		
		
		// if ($request->hasFile('poster')) {
        //     $path = base64_encode(file_get_contents($request->file('poster')));
        //     $films->poster = 'data:image/jpg;base64,'.$path;
        // }

		// if ($request->hasFile('banner')) {
        //     $path = base64_encode(file_get_contents($request->file('banner')));
        //     $films->banner = 'data:image/jpg;base64,'.$path;
        // }
		$films->film_name = $request->film_name;
		$films->global_name = $request->global_name;
		$films->banner = $request->banner;
		$films->poster = $request->poster;

		$films->producer = $request->producer;
		$films->categories = $request->categories;
		$films->director = $request->director;
		$films->caster = $request->caster;
		$films->duration = $request->duration;
		$films->release_date = $request->release_date;
		$films->status = $request->status;
		
		$films->trailer=$request->trailer;
		$films->description = $request->description;
		$films->format_id = $request->format_id;
		$films->save();
		
		return;

	}
	public function editFilm($id)
	{
		$formats = FormatFilm::all();
		$film = Film::findOrFail($id);
		return response()->json($film);
	}
	public function updateFilm(Request $request,$id)
	{
		$film = Film::findOrFail($id);
		$film->film_name = $request->film_name;
		$film->global_name = $request->global_name;
		$film->banner = $request->banner;
		$film->poster = $request->poster;

		$film->producer = $request->producer;
		$film->categories = $request->categories;
		$film->director = $request->director;
		$film->caster = $request->caster;
		$film->duration = $request->duration;
		$film->release_date = $request->release_date;
		$film->status = $request->status;
		
		$film->trailer=$request->trailer;
		$film->description = $request->description;
		$film->format_id = $request->format_id;
		$film->save();
		return ;
	}
	public function deleteFilm($id)
	{
		Film::where('id',$id)->delete();
		return;
	}
}
