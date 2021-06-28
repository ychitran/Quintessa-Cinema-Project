<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FormatFilm;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
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
		$films->film_name = $request->film_name;
		$films->global_name = $request->global_name;
		if ($request->hasFile('poster')) {
            $path = base64_encode(file_get_contents($request->file('poster')));
            $films->poster = 'data:image/jpg;base64,'.$path;
        }

		if ($request->hasFile('banner')) {
            $path = base64_encode(file_get_contents($request->file('banner')));
            $films->banner = 'data:image/jpg;base64,'.$path;
        }

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
		$film = Film::where('id',$id)->first();
		return view('admin.film.editfilm',compact('film','formats'));
	}
	public function updateFilm(Request $request,$id)
	{
		$film = Film::where('id',$id);
		$film->film_name=$request->film_name;
		$film->global_name=$request->global_name;
		if ($request->hasFile('image')) {
            $path = base64_encode(file_get_contents($request->file('image')));
            $film->poster = 'data:image/jpg;base64,'.$path;
        }
		$film->producer=$request->producer;
		$film->categories=$request->categories;
		$film->director=$request->director;
		$film->caster=$request->caster;
		$film->duration=$request->durations;
		$film->release_date=$request->release_date;
		$film->status=$request->status;
		$film->trailer=$request->trailer;
		$film->description=$request->description;
		$film->format_id=$request->format_id;
		$film->save();
		return redirect('admin/film');
	}
	public function deleteFilm($id)
	{
		Film::where('id',$id)->delete();
		return redirect('admin/film');
	}
}
