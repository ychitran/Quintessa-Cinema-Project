<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Room;
use App\Models\Screening;
use Illuminate\Http\Request;

class ScreeningsController extends Controller
{
    public function manageScreening()
	{
		$screenings = Screening::all();
		return view('admin.manage.screenings',compact('screenings'));
	}

	public function createScreeningPage()
	{
		$staff_id = auth()->user()->cinema_id; 
		$films = Film::where('status',1)->get();
		// $films = Film::all();
		$cinema = Cinema::findOrFail($staff_id);
		$rooms = Room::where('cinema_id', $staff_id)->get();
		return view('admin.screening.addscreening',compact('films','cinema','rooms'));
	}
	public function storeScreening(Request $request)
	{
		$screenings= new Screening();
		$screenings->film_id = $request->film_id;
		$screenings->room_id = $request->room_id;
		$screenings->date = $request->date;
		$screenings->start_time = $request->start_time;
		$screenings->save();
		return redirect('admin/screening');
	}

	public function editScreening($id)
	{
		$screenings = Screening::where('id',$id)->get();
		return view('admin.screening.editscreening',compact('screenings'));
	}

	public function updateScreening(Request $request,$id)
	{
		$screenings = Screening::where('id',$id)->update([
			'date'=>$request->date,
			'start_time'=>$request->start_time
		]) ;
		return redirect('admin/screening');
	}
	public function deleteScreening($id)
	{
		Screening::where('id',$id)->delete();
		return redirect('admin/screening');
	}
}
